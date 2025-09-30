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
        Schema::create('sdui_page_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('sdui_pages')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps();

            // Unique constraint to prevent duplicate assignments
            $table->unique(['page_id', 'role_id']);
            
            // Indexes
            $table->index('page_id');
            $table->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdui_page_role');
    }
};

