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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            $table->string('lead_id');
            $table->string('quote_id');
            $table->string('quote_date');
            $table->string('expiry_date');
            $table->string('item_desc');
            $table->string('hsn_code');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('tax');
            $table->string('total_value');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
