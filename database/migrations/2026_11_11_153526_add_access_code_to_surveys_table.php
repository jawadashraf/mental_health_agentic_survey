<?php

use App\Models\Survey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('surveys', function (Blueprint $table): void {
            $table->string('access_code', 64)->nullable()->unique()->after('slug');
        });

        // Seed existing surveys with unique codes
        Survey::query()->where('slug', 'raft')->update(['access_code' => '123456']);

        foreach (Survey::query()->whereNull('access_code')->get() as $survey) {
            $survey->update([
                'access_code' => Str::lower(Str::random(10)),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surveys', function (Blueprint $table): void {
            $table->dropColumn('access_code');
        });
    }
};
