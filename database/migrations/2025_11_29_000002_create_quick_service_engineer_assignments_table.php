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
        Schema::create('quick_service_engineer_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quick_service_request_id');
            $table->enum('assignment_type', ['Individual', 'Group']);
            $table->unsignedBigInteger('engineer_id')->nullable();
            $table->string('group_name')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Completed'])->default('Active');
            $table->dateTime('assigned_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign keys with custom names
            $table->foreign('quick_service_request_id', 'qs_eng_assign_request_fk')
                  ->references('id')->on('quick_service_requests')->onDelete('cascade');
            $table->foreign('engineer_id', 'qs_eng_assign_engineer_fk')
                  ->references('id')->on('engineers')->onDelete('set null');
            $table->foreign('supervisor_id', 'qs_eng_assign_supervisor_fk')
                  ->references('id')->on('engineers')->onDelete('set null');

            // Indexes with custom names
            $table->index('quick_service_request_id', 'qs_eng_assign_request_idx');
            $table->index('engineer_id', 'qs_eng_assign_engineer_idx');
            $table->index('status', 'qs_eng_assign_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_service_engineer_assignments');
    }
};

