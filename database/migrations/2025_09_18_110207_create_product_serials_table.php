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
        Schema::create('product_serials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('auto_generated_serial')->unique();
            $table->string('manual_serial')->nullable();
            $table->string('final_serial')->nullable(); // This will store either manual or auto-generated
            $table->boolean('is_manual')->default(false);
            $table->enum('status', ['active', 'inactive', 'sold', 'damaged'])->default('active');
            $table->timestamps();

            // Index for better performance
            $table->index(['product_id', 'status']);
            $table->index('final_serial');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_serials');
    }
};
