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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('customer_type');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone',10);
            $table->string('email')->unique();
            $table->date('dob');
            
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('pin_code');
            
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('image')->nullable();
            $table->enum('priority_level', ['High', 'Medium', 'Low']);

            $table->string('product_name')->nullable();
            $table->enum('product_type', ['PC', 'Laptop', 'Accessories']);
            $table->string('product_brand')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('image2')->nullable();
            $table->string('issue_type');
            $table->string('description')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
