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
        Schema::table('ecommerce_products', function (Blueprint $table) {
            // Add SKU field with unique constraint for e-commerce products
            $table->string('sku')->unique()->after('warehouse_product_id');
            
            // Add index for better performance on SKU searches
            $table->index('sku', 'ec_products_sku_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ecommerce_products', function (Blueprint $table) {
            // Drop the index first, then the column
            $table->dropIndex('ec_products_sku_idx');
            $table->dropColumn('sku');
        });
    }
};
