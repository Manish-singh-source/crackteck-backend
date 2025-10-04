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
        Schema::table('ecommerce_orders', function (Blueprint $table) {
            // Add phone fields after the respective address sections
            $table->string('shipping_phone', 20)->nullable()->after('shipping_address_line_2');
            $table->string('billing_phone', 20)->nullable()->after('billing_address_line_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ecommerce_orders', function (Blueprint $table) {
            $table->dropColumn(['shipping_phone', 'billing_phone']);
        });
    }
};
