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
        Schema::create('meets', function (Blueprint $table) {
            $table->id();

            $table->string('lead_id');
            $table->string('meet_title');
            $table->string('client_name');
            $table->enum('meeting_type', ['Onsite Demo', 'Virtual Meeting', 'Technical Visit', 'Business Meeting']);
            $table->date('date');
            $table->time('time');
            $table->string('location');
            $table->string('attachment')->nullable();
            $table->string('meetAgenda')->nullable();
            $table->string('followUp')->nullable();
            $table->enum('status', ['Scheduled', 'Confirmed', 'Completed', 'Cancelled']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meets');
    }
};
