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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Address type (shipping, billing, both)
            $table->enum('address_type', ['shipping', 'billing', 'both'])->default('both');
            
            // Address fields
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zipcode');
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            
            // Additional fields
            $table->boolean('is_default')->default(false);
            $table->string('label')->nullable(); // e.g., "Home", "Office"
            
            $table->timestamps();
            
            // Index for faster queries
            $table->index(['user_id', 'address_type']);
            $table->index(['user_id', 'is_default']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
