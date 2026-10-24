<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Store optional mailing list sign-ups, kept apart from survey sessions so answers stay anonymous.
     */
    public function up(): void
    {
        Schema::create('mailing_list_subscribers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->timestamps();

            $table->unique(['organization_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mailing_list_subscribers');
    }
};
