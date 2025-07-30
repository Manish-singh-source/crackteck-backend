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
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            
            $table->enum('lead_id', ['L-001', 'L-002', 'L-003', 'L-004']);
            $table->string('client_name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->date('followup_date')->nullable();
            $table->time('followup_time')->nullable();
            $table->enum('status', ['Pending', 'Done', 'Rescheduled', 'Cancelled']);
            $table->string('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};
