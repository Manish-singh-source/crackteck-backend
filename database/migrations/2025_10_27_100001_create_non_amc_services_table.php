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
        Schema::create('non_amc_services', function (Blueprint $table) {
            $table->id();
            
            // Customer Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone', 20);
            $table->string('email');
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('customer_type', ['Individual', 'Business'])->default('Individual');
            
            // Customer Address Information
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode', 10)->nullable();
            
            // Company Information (for Business customers)
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->string('gst_no', 20)->nullable();
            $table->string('pan_no', 20)->nullable();
            
            // Images
            $table->string('profile_image')->nullable();
            $table->string('customer_image')->nullable();
            
            // Service Details
            $table->enum('service_type', ['Online', 'Offline'])->default('Offline');
            $table->string('priority_level')->nullable();
            $table->text('additional_notes')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0);
            
            // Status and tracking
            $table->enum('status', ['Pending', 'In Progress', 'Completed', 'Cancelled'])->default('Pending');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
            
            // Indexes
            $table->index('email');
            $table->index('phone');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_amc_services');
    }
};

