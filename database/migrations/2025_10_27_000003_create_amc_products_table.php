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
        Schema::create('amc_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('amc_service_id')->constrained('amc_services')->onDelete('cascade');
            $table->foreignId('amc_branch_id')->nullable()->constrained('amc_branches')->onDelete('set null');
            
            $table->string('product_name');
            $table->string('product_type')->nullable();
            $table->string('product_brand')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('product_image')->nullable();
            $table->enum('warranty_status', ['In Warranty', 'Out of Warranty', 'Extended'])->default('Out of Warranty');
            
            $table->timestamps();
            
            // Indexes
            $table->index('amc_service_id');
            $table->index('amc_branch_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amc_products');
    }
};

