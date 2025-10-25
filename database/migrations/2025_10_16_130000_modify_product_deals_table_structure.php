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
        Schema::table('product_deals', function (Blueprint $table) {
            // Remove product-specific columns that will move to product_deal_items table
            $table->dropColumn([
                'ecommerce_product_id',
                'original_price',
                'discount_type',
                'discount_value',
                'offer_price'
            ]);
            
            // Change date fields to datetime fields with time selection
            $table->dropColumn(['start_date', 'end_date']);
            $table->datetime('offer_start_date')->nullable();
            $table->datetime('offer_end_date')->nullable();
            
            // Change status from boolean to enum for better clarity
            $table->dropColumn('status');
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_deals', function (Blueprint $table) {
            // Restore original columns
            $table->unsignedBigInteger('ecommerce_product_id');
            $table->decimal('original_price', 10, 2);
            $table->enum('discount_type', ['fixed', 'percentage'])->default('fixed');
            $table->decimal('discount_value', 10, 2);
            $table->decimal('offer_price', 10, 2);
            
            // Restore date fields
            $table->dropColumn(['offer_start_date', 'offer_end_date']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            
            // Restore boolean status
            $table->dropColumn('status');
            $table->boolean('status')->default(1);
        });
    }
};
