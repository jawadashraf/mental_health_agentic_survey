<?php

namespace App\Console\Commands;

use App\Services\RaftRagService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('raft:ingest-docs')]
#[Description('Ingest and embed markdown documents from docs/raft into SQLite vector store')]
class IngestRaftDocsCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(RaftRagService $ragService): int
    {
        $this->info('Starting ingestion of Raft Markdown documents into SQLite vector store...');

        $result = $ragService->ingestAllDocuments();

        $this->info("Successfully processed {$result['files_processed']} Markdown file(s) and stored {$result['chunks_created']} chunk embedding(s) in SQLite vector database.");

        return self::SUCCESS;
    }
}
