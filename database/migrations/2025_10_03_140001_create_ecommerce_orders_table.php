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
        Schema::create('ecommerce_orders', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Order details
            $table->string('order_number')->unique();
            $table->enum('order_source', ['cart', 'buy_now'])->default('cart');
            
            // Contact information
            $table->string('email');
            
            // Shipping address
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_country');
            $table->string('shipping_state');
            $table->string('shipping_city');
            $table->string('shipping_zipcode');
            $table->text('shipping_address_line_1');
            $table->text('shipping_address_line_2')->nullable();
            
            // Billing address
            $table->boolean('billing_same_as_shipping')->default(true);
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->text('billing_address_line_1')->nullable();
            $table->text('billing_address_line_2')->nullable();
            
            // Payment information
            $table->enum('payment_method', ['mastercard', 'cod'])->default('cod');
            $table->string('card_name')->nullable();
            $table->string('card_last_four')->nullable(); // Store only last 4 digits for security
            $table->string('card_expiry')->nullable();
            
            // Order totals
            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping_charges', 10, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            
            // Order status
            $table->enum('status', ['pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            
            // Additional fields
            $table->text('notes')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            
            $table->timestamps();
            
            // Indexes for faster queries
            $table->index(['user_id', 'status']);
            $table->index(['order_number']);
            $table->index(['status']);
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_orders');
    }
};
