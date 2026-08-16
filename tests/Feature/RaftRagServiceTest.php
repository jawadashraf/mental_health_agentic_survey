<?php

namespace Tests\Feature;

use App\Ai\Agents\RaftKnowledgeAgent;
use App\Models\DocumentChunk;
use App\Services\RaftRagService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Laravel\Ai\Embeddings;
use Tests\TestCase;

class RaftRagServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate', ['--database' => 'sqlite_vector']);

        DocumentChunk::truncate();

        // Use fake embeddings to prevent network calls during testing
        Embeddings::fake();
    }

    public function test_markdown_file_parsing_into_chunks(): void
    {
        $tempPath = storage_path('framework/testing/test_doc.md');
        File::ensureDirectoryExists(dirname($tempPath));

        $markdownContent = <<<'MD'
# Details of Organisation

Name: The Raft
Charity Number: 1194852

## Policy Statement

We are committed to safeguarding children.

### Code of Behaviour

Always treat care experienced young people with respect.
MD;

        File::put($tempPath, $markdownContent);

        $service = new RaftRagService;
        $chunks = $service->parseMarkdownChunks($tempPath, 'test_doc.md');

        $this->assertCount(3, $chunks);
        $this->assertEquals('Details of Organisation', $chunks[0]['section_heading']);
        $this->assertEquals('Policy Statement', $chunks[1]['section_heading']);
        $this->assertEquals('Code of Behaviour', $chunks[2]['section_heading']);

        File::delete($tempPath);
    }

    public function test_ingest_all_documents_stores_vector_chunks_in_sqlite(): void
    {
        $tempDir = storage_path('framework/testing/raft_docs');
        File::ensureDirectoryExists($tempDir);

        File::put("{$tempDir}/safeguarding.md", "# Safeguarding Policy\n\nProtects children and vulnerable adults.");

        $service = new RaftRagService;
        $result = $service->ingestAllDocuments($tempDir);

        $this->assertEquals(1, $result['files_processed']);
        $this->assertEquals(1, $result['chunks_created']);

        $this->assertDatabaseHas('document_chunks', [
            'source_file' => 'safeguarding.md',
            'section_heading' => 'Safeguarding Policy',
        ], 'sqlite_vector');

        File::deleteDirectory($tempDir);
    }

    public function test_cosine_similarity_calculation(): void
    {
        $service = new RaftRagService;

        $vecA = [1.0, 0.0, 0.0];
        $vecB = [1.0, 0.0, 0.0];
        $vecC = [0.0, 1.0, 0.0];

        $this->assertEqualsWithDelta(1.0, $service->calculateCosineSimilarity($vecA, $vecB), 0.0001);
        $this->assertEqualsWithDelta(0.0, $service->calculateCosineSimilarity($vecA, $vecC), 0.0001);
    }

    public function test_search_similar_chunks_ranks_correctly(): void
    {
        $vector = array_fill(0, 1536, 0.05);

        DocumentChunk::create([
            'source_file' => 'policy.md',
            'section_heading' => 'Safeguarding',
            'content' => 'Safeguarding children policy',
            'embedding' => $vector,
        ]);

        $service = new RaftRagService;
        $results = $service->searchSimilarChunks('How to report safeguarding concerns?', topK: 2, minScore: -1.0);

        $this->assertNotEmpty($results);
        $this->assertInstanceOf(DocumentChunk::class, $results->first());
    }

    public function test_ask_strict_question_returns_refusal_when_no_matching_chunks(): void
    {
        $service = new RaftRagService;
        $answer = $service->askStrictQuestion('What is the weather in Tokyo?');

        $this->assertStringContainsString("I'm sorry, but that information is not available", $answer);
    }

    public function test_ask_strict_question_prompts_raft_knowledge_agent(): void
    {
        RaftKnowledgeAgent::fake(['The Raft was founded in 2021.']);

        $vector = array_fill(0, 1536, 0.05);
        DocumentChunk::create([
            'source_file' => 'strategy.md',
            'section_heading' => 'History',
            'content' => 'The Raft history info',
            'embedding' => $vector,
        ]);

        $service = new RaftRagService;
        $answer = $service->askStrictQuestion('When was The Raft founded?', minScore: -1.0);

        $this->assertEquals('The Raft was founded in 2021.', $answer);
        RaftKnowledgeAgent::assertPrompted('When was The Raft founded?');
    }

    public function test_ingest_command_executes_successfully(): void
    {
        $this->artisan('raft:ingest-docs')
            ->assertExitCode(0);
    }
}
