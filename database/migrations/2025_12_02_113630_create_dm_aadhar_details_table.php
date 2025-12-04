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
        Schema::create('dm_aadhar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_man_id')->constrained('delivery_men')->onDelete('cascade');
            $table->string('aadhar_number')->unique();
            $table->string('aadhar_front_path');
            $table->string('aadhar_back_path');
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('delivery_man_id');
            $table->index('aadhar_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_aadhar_details');
    }
};
