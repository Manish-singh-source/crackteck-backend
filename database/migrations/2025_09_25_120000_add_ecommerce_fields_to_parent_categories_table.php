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
        Schema::table('parent_categories', function (Blueprint $table) {
            $table->string('category_image')->nullable()->after('parent_categories');
            $table->boolean('category_status_ecommerce')->default(false)->after('category_image');
            $table->string('url')->nullable()->after('category_status_ecommerce');
            $table->integer('sort_order')->default(0)->after('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parent_categories', function (Blueprint $table) {
            $table->dropColumn(['category_image', 'category_status_ecommerce', 'url', 'sort_order']);
        });
    }
};
