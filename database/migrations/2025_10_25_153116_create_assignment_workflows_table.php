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
        Schema::create('assignment_workflows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_assignment_id')->unique()->constrained('job_assignments')->onDelete('cascade');

            // Start Job Section
            $table->string('client_connected_via')->nullable();
            $table->text('client_confirmation')->nullable();
            $table->string('remote_tool_used')->nullable();
            $table->timestamp('start_job_completed_at')->nullable();

            // Diagnosis Section
            $table->json('diagnosis_types')->nullable(); // Store as JSON array
            $table->text('diagnosis_notes')->nullable();
            $table->timestamp('diagnosis_completed_at')->nullable();

            // Action Taken Section
            $table->text('fix_description')->nullable();
            $table->string('before_screenshot')->nullable();
            $table->string('after_screenshot')->nullable();
            $table->string('logs_file')->nullable();
            $table->timestamp('action_taken_completed_at')->nullable();

            // Complete Job Section
            $table->time('time_spent')->nullable();
            $table->string('result')->nullable(); // Resolved/Unresolved
            $table->text('client_feedback')->nullable();
            $table->timestamp('job_completed_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('job_assignment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_workflows');
    }
};
