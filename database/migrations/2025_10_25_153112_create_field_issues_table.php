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
        Schema::create('field_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_assignment_id')->constrained('job_assignments')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('c_jobs')->onDelete('cascade');
            $table->foreignId('engineer_id')->constrained('engineers')->onDelete('cascade');

            // Customer/Client Information
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('location')->nullable();

            // Issue Information
            $table->string('issue_type');
            $table->text('issue_description')->nullable();
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('Medium');

            // Escalation Information
            $table->string('reason_for_escalation');
            $table->text('escalation_notes')->nullable();

            // Status
            $table->enum('status', ['Pending', 'In Progress', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamp('escalated_at')->useCurrent();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('job_assignment_id');
            $table->index('job_id');
            $table->index('engineer_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_issues');
    }
};
