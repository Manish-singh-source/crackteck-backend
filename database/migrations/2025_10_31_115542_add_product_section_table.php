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
        Schema::table('quotation_products', function (Blueprint $table) {
            //
            $table->string('hsn_code');
            $table->string('sku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_products', function (Blueprint $table) {
            //
            $table->dropColumn(['hsn_code', 'sku']);
        });
    }
};
