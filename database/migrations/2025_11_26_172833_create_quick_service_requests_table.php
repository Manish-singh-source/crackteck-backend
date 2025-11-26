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
        Schema::create('quick_service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quick_service_id')->constrained('quick_services')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');    
            $table->string('product_name');
            $table->string('model_no')->nullable();
            $table->string('sku')->nullable();
            $table->string('hsn')->nullable();
            $table->string('brand')->nullable();
            $table->string('issue')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_service_requests');
    }
};
