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
        Schema::create('vendor_purchase_bills', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_bill_no')->unique();
            $table->string('vendor_name');
            $table->date('purchase_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_status', ['Pending', 'Complete', 'Reject', 'Partially Paid'])->default('Pending');
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_purchase_bills');
    }
};
