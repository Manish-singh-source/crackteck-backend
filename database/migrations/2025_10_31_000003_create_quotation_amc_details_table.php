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
        Schema::create('quotation_amc_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('quotations')->onDelete('cascade');
            $table->string('amc_type')->nullable(); // e.g., Annual, Quarterly
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('amc_amount', 10, 2)->nullable();
            $table->text('terms_conditions')->nullable();
            $table->timestamps();
            
            $table->index('quotation_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_amc_details');
    }
};

