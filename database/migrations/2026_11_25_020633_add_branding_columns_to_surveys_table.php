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
        Schema::table('surveys', function (Blueprint $table) {
            $table->string('logo_path')->nullable()->after('access_code');
            $table->string('brand_color', 20)->nullable()->after('logo_path');
            $table->string('welcome_title')->nullable()->after('brand_color');
            $table->text('welcome_message')->nullable()->after('welcome_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->dropColumn([
                'logo_path',
                'brand_color',
                'welcome_title',
                'welcome_message',
            ]);
        });
    }
};
