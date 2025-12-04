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
        Schema::create('vehical_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_man_id')->constrained('delivery_men')->onDelete('cascade');
            $table->string('brand');
            $table->string('model');
            $table->string('vehical_no')->unique();
            $table->string('fuel_type');
            $table->string('license_document_front_path')->nullable();
            $table->string('license_document_back_path')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('delivery_man_id');
            $table->index('vehical_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehical_registrations');
    }
};
