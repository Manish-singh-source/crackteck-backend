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
        Schema::table('quotations', function (Blueprint $table) {
            //
            $table->dropColumn(['item_desc', 'hsn_code', 'quantity', 'unit_price', 'tax', 'total_value']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotations', function (Blueprint $table) {
            //
            $table->string('item_desc');
            $table->string('hsn_code');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('tax');
            $table->string('total_value');
        });
    }
};
