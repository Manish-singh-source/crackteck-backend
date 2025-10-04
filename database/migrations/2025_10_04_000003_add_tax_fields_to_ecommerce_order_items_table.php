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
        Schema::table('ecommerce_order_items', function (Blueprint $table) {
            // Add tax-related fields after total_price
            $table->string('hsn_sac_code')->nullable()->after('total_price');
            $table->decimal('tax_percentage', 5, 2)->default(0)->after('hsn_sac_code');
            $table->decimal('taxable_value', 10, 2)->default(0)->after('tax_percentage');
            $table->decimal('igst_amount', 10, 2)->default(0)->after('taxable_value');
            $table->decimal('final_amount', 10, 2)->default(0)->after('igst_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ecommerce_order_items', function (Blueprint $table) {
            $table->dropColumn([
                'hsn_sac_code', 
                'tax_percentage', 
                'taxable_value', 
                'igst_amount', 
                'final_amount'
            ]);
        });
    }
};
