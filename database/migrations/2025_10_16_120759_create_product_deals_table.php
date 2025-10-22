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
            $table->unsignedBigInteger('ecommerce_product_id');
            $table->string('deal_title');
            $table->decimal('original_price', 10, 2);
            $table->enum('discount_type', ['fixed', 'percentage'])->default('fixed');
            $table->decimal('discount_value', 10, 2);
            $table->decimal('offer_price', 10, 2);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(1); // 1 = active, 0 = inactive
            $table->timestamps();

            // Optional: Foreign key if ecommerce_products table exists
            // $table->foreign('ecommerce_product_id')->references('id')->on('ecommerce_products')->onDelete('cascade');
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
