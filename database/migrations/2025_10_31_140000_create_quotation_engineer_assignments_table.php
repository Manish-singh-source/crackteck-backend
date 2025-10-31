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
        Schema::create('quotation_engineer_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('quotations')->onDelete('cascade');
            $table->enum('assignment_type', ['Individual', 'Group'])->default('Individual');
            $table->foreignId('engineer_id')->nullable()->constrained('engineers')->onDelete('cascade'); // For individual assignment
            $table->string('group_name')->nullable(); // For group assignment
            $table->foreignId('supervisor_id')->nullable()->constrained('engineers')->onDelete('set null'); // Supervisor for group
            $table->enum('status', ['Active', 'Inactive', 'Completed'])->default('Active');
            $table->timestamp('assigned_at')->useCurrent();
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('quotation_id');
            $table->index('engineer_id');
            $table->index('supervisor_id');
            $table->index('status');
        });

        // Pivot table for group members
        Schema::create('quotation_group_engineers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('quotation_engineer_assignments')->onDelete('cascade');
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
        Schema::dropIfExists('quotation_group_engineers');
        Schema::dropIfExists('quotation_engineer_assignments');
    }
};

