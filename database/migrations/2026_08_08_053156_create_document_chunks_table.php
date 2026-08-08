<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The database connection that should be used by the migration.
     */
    protected $connection = 'sqlite_vector';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::connection('sqlite_vector')->hasTable('document_chunks')) {
            Schema::connection('sqlite_vector')->create('document_chunks', function (Blueprint $table) {
                $table->id();
                $table->string('source_file');
                $table->string('section_heading')->nullable();
                $table->text('content');
                $table->json('embedding');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlite_vector')->dropIfExists('document_chunks');
    }
};
