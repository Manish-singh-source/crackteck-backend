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
        Schema::create('non_amc_engineer_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('non_amc_service_id')->constrained('non_amc_services')->onDelete('cascade');
            $table->enum('assignment_type', ['Individual', 'Group'])->default('Individual');
            $table->foreignId('engineer_id')->nullable()->constrained('engineers')->onDelete('cascade'); // For individual assignment
            $table->string('group_name')->nullable(); // For group assignment
            $table->foreignId('supervisor_id')->nullable()->constrained('engineers')->onDelete('set null'); // Supervisor for group
            $table->enum('status', ['Active', 'Inactive', 'Transferred', 'Completed'])->default('Active');
            $table->timestamp('assigned_at')->useCurrent();
            $table->foreignId('transferred_to')->nullable()->constrained('non_amc_engineer_assignments')->onDelete('set null');
            $table->timestamp('transferred_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('non_amc_service_id');
            $table->index('engineer_id');
            $table->index('supervisor_id');
            $table->index('status');
        });

        Schema::create('non_amc_group_engineers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('non_amc_engineer_assignments')->onDelete('cascade');
            $table->foreignId('engineer_id')->constrained('engineers')->onDelete('cascade');
            $table->boolean('is_supervisor')->default(false);
            $table->timestamps();

            // Indexes
            $table->index('assignment_id');
            $table->index('engineer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_amc_group_engineers');
        Schema::dropIfExists('non_amc_engineer_assignments');
    }
};
