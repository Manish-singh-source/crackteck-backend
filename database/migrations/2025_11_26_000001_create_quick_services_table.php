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
        Schema::create('quick_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_image')->nullable();
            $table->string('name');
            $table->decimal('service_price', 10, 2);
            $table->text('service_description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            // Indexes
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_services');
    }
};

