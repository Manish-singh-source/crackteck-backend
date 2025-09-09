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
        Schema::create('engineers', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone',10);
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female']);
            
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            
            $table->string('bank_acc_holder_name')->nullable();
            $table->string('bank_acc_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            
            
            $table->enum('police_verification', ['Yes', 'No'])->comment('1: Yes , 2: No')->nullable();
            $table->enum('police_verification_status', ['Pending', 'Completed'])->comment('1: Pending , 2: Completed')->nullable();
            $table->string('police_certificate')->nullable();
            
            $table->enum('designation', ['Network Engineer', 'Hardware Technician']);
            $table->enum('department', ['Installation', 'Maintenance', 'Support']);
            $table->date('join_date')->nullable();
            
            $table->enum('primary_skills', ['Network Engineer', 'Hardware Technician']);
            $table->string('pic')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineers');
    }
};
