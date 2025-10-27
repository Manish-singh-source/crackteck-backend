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
        Schema::create('amc_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('amc_service_id')->constrained('amc_services')->onDelete('cascade');
            
            $table->string('branch_name');
            $table->text('address_line1');
            $table->text('address_line2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');
            $table->string('contact_person')->nullable();
            $table->string('contact_no')->nullable();
            
            $table->timestamps();
            
            // Indexes
            $table->index('amc_service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amc_branches');
    }
};

