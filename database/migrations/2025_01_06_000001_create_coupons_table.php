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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            
            // Basic coupon information
            $table->string('coupon_code')->unique();
            $table->string('coupon_title');
            $table->text('coupon_description')->nullable();
            
            // Discount details
            $table->enum('discount_type', ['percentage', 'fixed_amount']);
            $table->decimal('discount_value', 10, 2);
            
            // Usage conditions
            $table->decimal('min_purchase_amount', 10, 2)->nullable();
            
            // Validity period
            $table->datetime('start_date');
            $table->datetime('end_date');
            
            // Usage limits
            $table->integer('total_usage_limit')->nullable(); // Total times this coupon can be used
            $table->integer('usage_limit_per_customer')->nullable(); // Max uses per customer
            $table->integer('current_usage_count')->default(0); // Current usage count
            
            // Status
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('coupon_code');
            $table->index('status');
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
