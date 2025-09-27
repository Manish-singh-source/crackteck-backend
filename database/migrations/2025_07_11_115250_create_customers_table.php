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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->string('branch_name')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('customer_type', ['regular', 'amc_customer'])->default('regular');
            $table->string('company_name')->nullable();
            $table->string('company_addr')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('pic')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
