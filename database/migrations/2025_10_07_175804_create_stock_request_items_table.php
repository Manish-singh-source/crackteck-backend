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
        Schema::create('stock_request_items', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('stock_request_id')->constrained('stock_requests')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');

            // Item details
            $table->integer('quantity')->unsigned()->default(1);

            $table->timestamps();

            // Indexes for better performance
            $table->index('stock_request_id');
            $table->index('product_id');

            // Unique constraint to prevent duplicate products in same request
            $table->unique(['stock_request_id', 'product_id'], 'unique_request_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_request_items');
    }
};
