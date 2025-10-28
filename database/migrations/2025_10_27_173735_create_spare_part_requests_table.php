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
        Schema::create('spare_part_requests', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('requested_by')->constrained('engineers')->onDelete('cascade');
            $table->foreignId('delivery_man_id')->nullable()->constrained('delivery_men')->onDelete('set null');

            // Request details
            $table->date('request_date');
            $table->enum('urgency_level', ['Low', 'Medium', 'High', 'Critical'])->default('Medium');
            $table->integer('quantity')->default(1);
            $table->text('reason')->nullable();

            // Status
            $table->enum('approval_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');

            // Service request reference (if applicable)
            $table->string('service_request_id')->nullable();

            // Timestamps
            $table->timestamps();

            // Indexes for better performance
            $table->index('product_id');
            $table->index('requested_by');
            $table->index('delivery_man_id');
            $table->index('request_date');
            $table->index('approval_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_part_requests');
    }
};
