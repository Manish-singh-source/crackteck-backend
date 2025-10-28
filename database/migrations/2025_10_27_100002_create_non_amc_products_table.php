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
        Schema::create('non_amc_products', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to non_amc_services
            $table->foreignId('non_amc_service_id')->constrained('non_amc_services')->onDelete('cascade');
            
            // Product Information
            $table->string('product_name');
            $table->string('product_type')->nullable();
            $table->string('product_brand')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('product_image')->nullable();
            
            // Issue Information
            $table->string('issue_type')->nullable();
            $table->text('issue_description')->nullable();
            
            // Warranty Information
            $table->enum('warranty_status', ['In Warranty', 'Out of Warranty', 'Unknown'])->default('Unknown');
            
            $table->timestamps();
            
            // Indexes
            $table->index('non_amc_service_id');
            $table->index('serial_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_amc_products');
    }
};

