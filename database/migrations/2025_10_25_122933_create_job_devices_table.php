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
        Schema::create('job_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('c_jobs')->onDelete('cascade');
            $table->string('product_name')->nullable();
            $table->enum('product_type', ['PC', 'Laptop', 'Accessories'])->nullable();
            $table->string('product_brand')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('image')->nullable();
            $table->string('issue_type')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index('job_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_devices');
    }
};
