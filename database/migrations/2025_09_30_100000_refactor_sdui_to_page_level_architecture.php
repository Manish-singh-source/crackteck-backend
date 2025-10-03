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
        // Add json_schema column to sdui_pages table
        Schema::table('sdui_pages', function (Blueprint $table) {
            $table->json('json_schema')->nullable()->after('screen_type');
        });

        // Update sdui_page_versions to include json_schema in version_data
        // The version_data already stores complete snapshots, so no schema change needed
        // But we'll ensure it captures json_schema going forward

        // Mark component tables as deprecated by adding a comment
        // We're not dropping them yet to allow for data migration if needed
        // DB::statement("ALTER TABLE sdui_components COMMENT 'DEPRECATED: Use json_schema in sdui_pages instead'");
        // DB::statement("ALTER TABLE sdui_component_role COMMENT 'DEPRECATED: Use json_schema in sdui_pages instead'");
        // DB::statement("ALTER TABLE sdui_component_versions COMMENT 'DEPRECATED: Use json_schema in sdui_pages instead'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove json_schema column from sdui_pages
        Schema::table('sdui_pages', function (Blueprint $table) {
            $table->dropColumn('json_schema');
        });

        // Remove deprecation comments
        // DB::statement("ALTER TABLE sdui_components COMMENT ''");
        // DB::statement("ALTER TABLE sdui_component_role COMMENT ''");
        // DB::statement("ALTER TABLE sdui_component_versions COMMENT ''");
    }
};

