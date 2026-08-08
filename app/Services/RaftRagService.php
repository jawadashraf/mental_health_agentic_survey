<?php

namespace App\Services;

use App\Ai\Agents\RaftKnowledgeAgent;
use App\Models\DocumentChunk;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Laravel\Ai\Embeddings;

class RaftRagService
{
    /**
     * Ingest all Markdown documents from the docs/raft directory into SQLite vector database.
     *
     * @return array{files_processed: int, chunks_created: int}
     */
    public function ingestAllDocuments(?string $directoryPath = null): array
    {
        $directoryPath ??= base_path('docs/raft');

        if (! File::exists($directoryPath)) {
            return ['files_processed' => 0, 'chunks_created' => 0];
        }

        $files = File::files($directoryPath);
        $markdownFiles = array_filter($files, fn ($file) => $file->getExtension() === 'md');

        $chunksCount = 0;
        $filesCount = 0;

        foreach ($markdownFiles as $file) {
            $chunks = $this->parseMarkdownChunks($file->getRealPath(), $file->getFilename());

            foreach ($chunks as $chunkData) {
                // Generate vector embedding
                $response = Embeddings::for([$chunkData['content']])->generate();
                $embeddingVector = $response->embeddings[0] ?? [];

                DocumentChunk::updateOrCreate(
                    [
                        'source_file' => $chunkData['source_file'],
                        'section_heading' => $chunkData['section_heading'],
                    ],
                    [
                        'content' => $chunkData['content'],
                        'embedding' => $embeddingVector,
                    ]
                );

                $chunksCount++;
            }

            $filesCount++;
        }

        return [
            'files_processed' => $filesCount,
            'chunks_created' => $chunksCount,
        ];
    }

    /**
     * Parse a Markdown file into section-based chunks.
     *
     * @return array<int, array{source_file: string, section_heading: string, content: string}>
     */
    public function parseMarkdownChunks(string $filePath, string $filename): array
    {
        $rawContent = File::get($filePath);
        $lines = explode("\n", $rawContent);

        $chunks = [];
        $currentHeading = 'General Information';
        $currentContentLines = [];

        foreach ($lines as $line) {
            if (preg_match('/^(#{1,3})\s+(.+)$/', trim($line), $matches)) {
                // Save previous chunk if it has text content
                $content = trim(implode("\n", $currentContentLines));
                if (! empty($content)) {
                    $chunks[] = [
                        'source_file' => $filename,
                        'section_heading' => $currentHeading,
                        'content' => "## {$currentHeading}\n\n{$content}",
                    ];
                }

                $currentHeading = trim($matches[2]);
                $currentContentLines = [];
            } else {
                $currentContentLines[] = $line;
            }
        }

        // Save last chunk
        $content = trim(implode("\n", $currentContentLines));
        if (! empty($content)) {
            $chunks[] = [
                'source_file' => $filename,
                'section_heading' => $currentHeading,
                'content' => "## {$currentHeading}\n\n{$content}",
            ];
        }

        return $chunks;
    }

    /**
     * Search for most relevant document chunks based on Cosine Similarity.
     *
     * @return Collection<int, DocumentChunk>
     */
    public function searchSimilarChunks(string $userQuery, int $topK = 4, float $minScore = 0.2): Collection
    {
        // Generate embedding vector for the user query
        $queryResponse = Embeddings::for([$userQuery])->generate();
        $queryVector = $queryResponse->embeddings[0] ?? [];

        if (empty($queryVector)) {
            return collect();
        }

        $allChunks = DocumentChunk::all();

        return $allChunks->map(function (DocumentChunk $chunk) use ($queryVector) {
            $score = $this->calculateCosineSimilarity($queryVector, $chunk->embedding ?? []);
            $chunk->similarity_score = $score;

            return $chunk;
        })
            ->filter(fn (DocumentChunk $chunk) => $chunk->similarity_score >= $minScore)
            ->sortByDesc('similarity_score')
            ->take($topK)
            ->values();
    }

    /**
     * Answer user questions strictly based on retrieved Raft documents.
     */
    public function askStrictQuestion(string $userQuery, float $minScore = 0.10): string
    {
        $relevantChunks = $this->searchSimilarChunks($userQuery, topK: 4, minScore: $minScore);

        if ($relevantChunks->isEmpty()) {
            return "I'm sorry, but that information is not available in The Raft's official policy, strategy, or constitution documents.";
        }

        $contextText = $relevantChunks->map(fn ($chunk) => "Source: {$chunk->source_file} ({$chunk->section_heading})\n{$chunk->content}")->implode("\n\n---\n\n");

        return (new RaftKnowledgeAgent($contextText))->prompt($userQuery)->text;
    }

    /**
     * Compute Cosine Similarity between two numeric vectors.
     *
     * @param  array<float>  $vecA
     * @param  array<float>  $vecB
     */
    public function calculateCosineSimilarity(array $vecA, array $vecB): float
    {
        if (empty($vecA) || empty($vecB) || count($vecA) !== count($vecB)) {
            return 0.0;
        }

        $dotProduct = 0.0;
        $normA = 0.0;
        $normB = 0.0;

        foreach ($vecA as $i => $valA) {
            $valB = $vecB[$i];
            $dotProduct += $valA * $valB;
            $normA += $valA * $valA;
            $normB += $valB * $valB;
        }

        if ($normA <= 0.0 || $normB <= 0.0) {
            return 0.0;
        }

        return $dotProduct / (sqrt($normA) * sqrt($normB));
    }
}
