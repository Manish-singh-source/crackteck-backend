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
        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->id();
            
            // Reference to warehouse product
            $table->foreignId('warehouse_product_id')->constrained('products')->onDelete('cascade');
            $table->string('sku')->unique();
            
            // E-commerce specific fields
            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_product_url_slug')->unique()->nullable();
            // Installation Options (JSON array for multiple entries)
            $table->json('with_installation')->nullable();
            
            // Company Warranty (separate from brand warranty in warehouse)
            $table->string('company_warranty')->nullable();
            
            // E-commerce specific descriptions (rich text)
            $table->longText('ecommerce_short_description')->nullable();
            $table->longText('ecommerce_full_description')->nullable();
            $table->longText('ecommerce_technical_specification')->nullable();
            
            // Inventory Management for E-commerce
            $table->integer('min_order_qty')->default(1);
            $table->integer('max_order_qty')->nullable();
            
            // Shipping Details
            $table->string('product_weight')->nullable();
            $table->string('product_dimensions')->nullable();
            $table->decimal('shipping_charges', 10, 2)->nullable();
            $table->enum('shipping_class', ['Light', 'Heavy', 'Fragile'])->default('Light');
            
            // E-commerce specific flags
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_suggested')->default(false);
            $table->boolean('is_todays_deal')->default(false);
            
            // Product Tags (JSON array)
            $table->json('product_tags')->nullable();
            
            // E-commerce Status
            $table->enum('ecommerce_status', ['active', 'inactive', 'draft'])->default('active');
            
            // Sales tracking
            $table->integer('total_sold')->default(0);
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('sku', 'ec_products_sku_idx');
            $table->index(['warehouse_product_id', 'ecommerce_status'], 'ec_products_warehouse_status_idx');
            $table->index('meta_product_url_slug', 'ec_products_url_slug_idx');
            $table->index(['is_featured', 'is_best_seller', 'is_todays_deal'], 'ec_products_flags_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_products');
    }
};
