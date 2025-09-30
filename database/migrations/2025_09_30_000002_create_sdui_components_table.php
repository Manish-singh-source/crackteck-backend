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
        Schema::create('sdui_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('sdui_pages')->onDelete('cascade');
            $table->string('type', 100)->comment('header, text, button, form, list, image, input, card, etc.');
            $table->json('props')->comment('Component properties as JSON');
            $table->integer('order')->default(0)->comment('Display order within page');
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->index(['page_id', 'order']);
            $table->index('type');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdui_components');
    }
};

