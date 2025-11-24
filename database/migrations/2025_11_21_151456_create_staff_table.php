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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->enum('staff_role', ['engineer', 'sales_person', 'delivery_man'])->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone',10)->unique()->index('phone_index');
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            
            $table->string('current_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode')->nullable();
            
            $table->enum('employment_type', ['Full-time', 'Part-time', 'Contract'])->nullable();
            $table->date('joining_date')->nullable();
            $table->string('assigned_area')->nullable();
            
            $table->string('vehicle_type')->nullable();
            $table->string('vehical_no')->nullable();
            $table->string('driving_license_no')->nullable();
            $table->string('driving_license')->nullable();
            
            $table->enum('police_verification', ['Yes', 'No'])->nullable();
            $table->enum('police_verification_status', ['Pending', 'Completed'])->nullable();
            $table->string('police_certificate')->nullable();
            
            $table->string('pan_no')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('aadhar_card')->nullable();
            
            $table->string('bank_acc_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('passbook_pic')->nullable();
            $table->enum('status', ['active', 'inactive', 'resigned', 'terminated', 'blocked', 'suspended', 'pending'])->default('active');
            $table->string('otp')->nullable();
            $table->timestamp('otp_expiry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
