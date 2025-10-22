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
        Schema::create('product_deal_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_deal_id');
            $table->unsignedBigInteger('ecommerce_product_id');
            $table->decimal('original_price', 10, 2);
            $table->enum('discount_type', ['percentage', 'flat'])->default('percentage');
            $table->decimal('discount_value', 10, 2);
            $table->decimal('offer_price', 10, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('product_deal_id')->references('id')->on('product_deals')->onDelete('cascade');
            $table->foreign('ecommerce_product_id')->references('id')->on('ecommerce_products')->onDelete('cascade');
            
            // Ensure unique product per deal
            $table->unique(['product_deal_id', 'ecommerce_product_id'], 'unique_product_per_deal');
            
            // Indexes for performance
            $table->index('product_deal_id');
            $table->index('ecommerce_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_deal_items');
    }
};
