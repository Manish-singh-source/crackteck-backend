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
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('quantity')->nullable()->after('amount');
            $table->string('delivery')->nullable()->after('quantity');
            $table->foreignId('delivery_man_id')->nullable()->constrained('delivery_men')->onDelete('set null')->after('delivery');
            $table->enum('status', ['Pending', 'Assigned', 'Out for Delivery', 'Delivered'])->default('Pending')->after('delivery_man_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['delivery_man_id']);
            $table->dropColumn(['quantity', 'delivery', 'delivery_man_id', 'status']);
        });
    }
};
