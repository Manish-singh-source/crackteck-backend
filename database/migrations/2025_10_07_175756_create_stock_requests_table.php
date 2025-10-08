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
        Schema::create('stock_requests', function (Blueprint $table) {
            $table->id();

            // Foreign key to users table
            $table->foreignId('requested_by')->constrained('users')->onDelete('cascade');

            // Request details
            $table->date('request_date');
            $table->text('reason');
            $table->enum('urgency_level', ['Low', 'Medium', 'High', 'Critical'])->default('Low');

            // Status fields
            $table->string('approval_status')->default('Pending');
            $table->string('final_status')->default('Pending');

            $table->timestamps();

            // Indexes for better performance
            $table->index('requested_by');
            $table->index('request_date');
            $table->index(['approval_status', 'final_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_requests');
    }
};
