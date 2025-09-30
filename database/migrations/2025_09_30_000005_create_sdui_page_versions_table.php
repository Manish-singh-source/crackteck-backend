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
        Schema::create('sdui_page_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('sdui_pages')->onDelete('cascade');
            $table->integer('version_number')->comment('Incremental version number');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description')->nullable();
            $table->string('screen_type', 100)->nullable();
            $table->boolean('is_active');
            $table->json('version_data')->comment('Full snapshot of page data including roles');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('created_at');

            // Indexes
            $table->index(['page_id', 'version_number']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdui_page_versions');
    }
};

