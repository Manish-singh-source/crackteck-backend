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
        Schema::create('inventory_update_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('ecommerce_order_id')->nullable()->constrained('ecommerce_orders')->onDelete('set null');
            $table->integer('old_quantity');
            $table->integer('ordered_quantity');
            $table->integer('new_quantity');
            $table->string('order_number')->nullable();
            $table->enum('update_type', ['order_placed', 'manual_adjustment', 'restocked'])->default('order_placed');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index('product_id');
            $table->index('ecommerce_order_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_update_logs');
    }
};
