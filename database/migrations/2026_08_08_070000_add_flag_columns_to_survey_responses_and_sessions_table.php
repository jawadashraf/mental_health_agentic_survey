<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('survey_responses', function (Blueprint $table) {
            $table->boolean('is_flagged')->default(false)->index();
            $table->string('flag_type')->nullable();
            $table->string('flag_severity')->nullable();
            $table->text('flag_reason')->nullable();
            $table->text('flag_action_taken')->nullable();
            $table->timestamp('flagged_at')->nullable();
        });

        Schema::table('survey_sessions', function (Blueprint $table) {
            $table->boolean('has_flags')->default(false)->index();
            $table->unsignedInteger('flag_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('survey_responses', function (Blueprint $table) {
            $table->dropColumn([
                'is_flagged',
                'flag_type',
                'flag_severity',
                'flag_reason',
                'flag_action_taken',
                'flagged_at',
            ]);
        });

        Schema::table('survey_sessions', function (Blueprint $table) {
            $table->dropColumn([
                'has_flags',
                'flag_count',
            ]);
        });
    }
};
