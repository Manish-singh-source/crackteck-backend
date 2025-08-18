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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone',10);
            $table->string('email')->unique();
            $table->date('dob');
            $table->enum('gender', ['male', 'female']);
            $table->enum('customer_type', ['Retail', 'Wholesale' ,"Corporate"]);
            $table->string('company_name');
            $table->string('company_addr');
            $table->string('gst_no');
            $table->string('pan_no');
            
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
