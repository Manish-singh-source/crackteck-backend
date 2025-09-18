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
        Schema::create('scrap_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('product_serial_id')->nullable()->constrained('product_serials')->onDelete('set null');
            $table->string('serial_number'); // Store the actual serial number for reference
            $table->string('product_name'); // Store product name for historical reference
            $table->string('product_sku'); // Store SKU for reference
            $table->text('reason'); // Reason for scrapping
            $table->integer('quantity_scrapped')->default(1); // Number of items scrapped
            $table->timestamp('scrapped_at'); // When it was scrapped
            $table->string('scrapped_by')->nullable(); // Who scrapped it (user reference)
            $table->timestamps();

            // Indexes for better performance
            $table->index(['product_id', 'created_at']);
            $table->index('serial_number');
            $table->index('scrapped_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scrap_items');
    }
};
