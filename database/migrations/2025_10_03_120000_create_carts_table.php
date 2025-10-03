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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to users table (for consistency with wishlist)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Foreign key to ecommerce_products table
            $table->foreignId('ecommerce_product_id')->constrained('ecommerce_products')->onDelete('cascade');
            
            // Quantity of the product in cart
            $table->integer('quantity')->default(1);
            
            $table->timestamps();
            
            // Unique constraint to prevent duplicate entries for same user and product
            $table->unique(['user_id', 'ecommerce_product_id'], 'unique_user_product_cart');
            
            // Indexes for better performance
            $table->index('user_id');
            $table->index('ecommerce_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
