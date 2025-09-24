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
        Schema::table('website_banners', function (Blueprint $table) {
            // Add new fields for enhanced banner functionality
            $table->string('banner_heading')->nullable()->after('banner_title');
            $table->string('banner_sub_heading')->nullable()->after('banner_heading');
            $table->string('button_text')->nullable()->after('banner_description');
            $table->integer('sort_order')->default(0)->after('status');
            
            // Add index for better performance when ordering
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_banners', function (Blueprint $table) {
            $table->dropIndex(['sort_order']);
            $table->dropColumn(['banner_heading', 'banner_sub_heading', 'button_text', 'sort_order']);
        });
    }
};
