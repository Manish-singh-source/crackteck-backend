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
        Schema::create('ecommerce_order_items', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to ecommerce_orders table
            $table->foreignId('ecommerce_order_id')->constrained('ecommerce_orders')->onDelete('cascade');
            
            // Foreign key to ecommerce_products table
            $table->foreignId('ecommerce_product_id')->constrained('ecommerce_products')->onDelete('cascade');
            
            // Product details at time of order (for historical accuracy)
            $table->string('product_name');
            $table->string('product_sku')->nullable();
            $table->text('product_image')->nullable();
            
            // Pricing details
            $table->decimal('unit_price', 10, 2); // Price per unit at time of order
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2); // unit_price * quantity
            
            // Shipping details for this item
            $table->decimal('shipping_charges', 10, 2)->default(0);
            $table->boolean('free_shipping')->default(false);
            
            $table->timestamps();
            
            // Indexes for faster queries
            $table->index(['ecommerce_order_id']);
            $table->index(['ecommerce_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_order_items');
    }
};
