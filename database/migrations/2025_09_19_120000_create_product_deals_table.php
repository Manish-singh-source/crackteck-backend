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
        Schema::create('product_deals', function (Blueprint $table) {
            $table->id();
            
            // Reference to e-commerce product
            $table->foreignId('ecommerce_product_id')->constrained('ecommerce_products')->onDelete('cascade');
            
            // Deal information
            $table->string('deal_title');
            $table->decimal('original_price', 10, 2);
            $table->enum('discount_type', ['price', 'percentage']);
            $table->decimal('discount_value', 10, 2);
            $table->decimal('offer_price', 10, 2);
            
            // Deal period
            $table->date('start_date');
            $table->date('end_date');
            
            // Status
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['ecommerce_product_id', 'status'], 'product_deals_product_status_idx');
            $table->index(['start_date', 'end_date'], 'product_deals_date_range_idx');
            $table->index('status', 'product_deals_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_deals');
    }
};
