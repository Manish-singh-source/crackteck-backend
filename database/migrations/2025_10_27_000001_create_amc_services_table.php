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
        Schema::create('amc_services', function (Blueprint $table) {
            $table->id();
            
            // Customer Details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('customer_type')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('customer_image')->nullable();
            
            // AMC Details
            $table->foreignId('amc_plan_id')->nullable()->constrained('a_m_c_s')->onDelete('set null');
            $table->string('plan_duration')->nullable(); // e.g., "6 Months", "1 Year"
            $table->date('plan_start_date')->nullable();
            $table->date('plan_end_date')->nullable();
            $table->string('priority_level')->nullable();
            $table->text('additional_notes')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0);
            
            // Status and tracking
            $table->enum('status', ['Pending', 'Active', 'Expired', 'Cancelled'])->default('Pending');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
            
            // Indexes
            $table->index('email');
            $table->index('phone');
            $table->index('status');
            $table->index('plan_start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amc_services');
    }
};

