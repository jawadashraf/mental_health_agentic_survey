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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('organization_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->string('role')->default('organization_member')->after('email');
            $table->boolean('receives_flag_alerts')->default(true)->after('role');
        });

        Schema::table('survey_sessions', function (Blueprint $table) {
            $table->foreignId('survey_id')->nullable()->after('id')->constrained()->nullOnDelete();
        });

        Schema::table('survey_responses', function (Blueprint $table) {
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->text('review_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('survey_responses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('reviewed_by');
            $table->dropColumn(['reviewed_at', 'review_notes']);
        });

        Schema::table('survey_sessions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('survey_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('organization_id');
            $table->dropColumn(['role', 'receives_flag_alerts']);
        });
    }
};
