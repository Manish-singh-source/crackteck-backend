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
        Schema::create('amc_service_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('amc_service_id')->constrained('amc_services')->onDelete('cascade');
            $table->integer('visit_number');
            $table->dateTime('scheduled_date');
            $table->foreignId('engineer_id')->nullable()->constrained('engineers')->onDelete('set null');
            $table->string('issue_type')->nullable();
            $table->text('report')->nullable();
            $table->enum('status', ['Pending', 'Upcoming', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
            
            // Indexes
            $table->index('amc_service_id');
            $table->index('scheduled_date');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amc_service_visits');
    }
};

