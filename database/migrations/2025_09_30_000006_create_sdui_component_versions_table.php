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
        Schema::create('sdui_component_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('component_id')->constrained('sdui_components')->onDelete('cascade');
            $table->foreignId('page_id')->constrained('sdui_pages')->onDelete('cascade');
            $table->integer('version_number')->comment('Incremental version number');
            $table->string('type', 100);
            $table->json('props');
            $table->integer('order');
            $table->boolean('is_active');
            $table->json('version_data')->comment('Full snapshot of component data including roles');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('created_at');

            // Indexes
            $table->index(['component_id', 'version_number']);
            $table->index('page_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdui_component_versions');
    }
};

