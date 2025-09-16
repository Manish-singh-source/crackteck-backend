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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Vendor & Purchase Info
            $table->string('vendor_name')->nullable();
            $table->string('po_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_pdf')->nullable();
            $table->string('invoice_image')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('bill_due_date')->nullable();
            $table->decimal('bill_amount', 15, 2)->nullable();

            // Basic Product Information
            $table->string('product_name');
            $table->string('hsn_code')->nullable();
            $table->string('sku')->unique();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('set null');
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->foreignId('parent_category_id')->nullable()->constrained('parent_categories')->onDelete('set null');
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->onDelete('set null');

            // Product Details
            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('technical_specification')->nullable();
            $table->string('brand_warranty')->nullable();

            // Pricing
            $table->decimal('cost_price', 15, 2)->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();
            $table->decimal('discount_price', 15, 2)->nullable();
            $table->decimal('tax', 5, 2)->nullable();
            $table->decimal('final_price', 15, 2)->nullable();

            // Inventory Details
            $table->integer('stock_quantity')->default(0);
            $table->enum('stock_status', ['In Stock', 'Out of Stock'])->default('In Stock');

            // Rack Details
            $table->foreignId('warehouse_id')->nullable()->constrained('warehouses')->onDelete('set null');
            $table->foreignId('warehouse_rack_id')->nullable()->constrained('warehouse_racks')->onDelete('set null');
            $table->string('rack_zone_area')->nullable();
            $table->string('rack_no')->nullable();
            $table->string('level_no')->nullable();
            $table->string('position_no')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('rack_status', ['Available', 'Blocked', 'Reserved'])->default('Available');

            // Images & Media
            $table->string('main_product_image')->nullable();
            $table->json('additional_product_images')->nullable();
            $table->string('datasheet_manual')->nullable();

            // Product Variations
            $table->string('color_options')->nullable();
            $table->string('size_options')->nullable();
            $table->string('length_options')->nullable();

            // Product Status
            $table->enum('status', ['Active', 'Inactive'])->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
