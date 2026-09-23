<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Create the Raft organisation and its surveys, link existing sessions to them,
     * and promote existing users to super admin so nobody is locked out.
     */
    public function up(): void
    {
        $now = now();

        $organizationId = DB::table('organizations')->insertGetId([
            'name' => 'The Raft',
            'slug' => 'raft',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $surveys = [
            ['name' => 'Raft Survey', 'slug' => 'raft', 'config_key' => 'raft-survey'],
            ['name' => 'Raft Survey (Test)', 'slug' => 'raft-test', 'config_key' => 'raft-survey-test'],
        ];

        foreach ($surveys as $survey) {
            $surveyId = DB::table('surveys')->insertGetId([
                ...$survey,
                'organization_id' => $organizationId,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('survey_sessions')
                ->where('survey_type', $survey['slug'])
                ->update(['survey_id' => $surveyId]);
        }

        DB::table('users')->update(['role' => 'super_admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('survey_sessions')->update(['survey_id' => null]);
        DB::table('surveys')->whereIn('slug', ['raft', 'raft-test'])->delete();
        DB::table('organizations')->where('slug', 'raft')->delete();
    }
};
