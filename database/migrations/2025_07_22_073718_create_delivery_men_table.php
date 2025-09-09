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
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone',10);
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female']);
            
            $table->string('current_address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            
            $table->enum('employment_type', ['Full-time', 'Part-time']);
            $table->date('joining_date')->nullable();
            $table->enum('assigned_area', ['ABC', 'DEF']);
            
            $table->enum('vehicle_type', ['Bike', 'Scooter', 'Car', 'Van']);
            $table->string('vehical_no');
            $table->string('driving_license_no');
            $table->string('driving_license')->nullable();
            
            $table->enum('police_verification', ['Yes', 'No']);
            $table->enum('police_verification_status', ['Pending', 'Completed']);
            $table->string('police_certificate')->nullable();
            
            $table->string('govid');
            $table->string('idno');
            $table->string('adhar_pic')->nullable();
            
            $table->string('bank_acc_no');
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('passbook_pic')->nullable();
            $table->enum('status', ['Active', 'Inactive']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_men');
    }
};
