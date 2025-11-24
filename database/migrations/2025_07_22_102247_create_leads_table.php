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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone',10);
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female']);
            
            $table->string('company_name');
            $table->string('designation');
            $table->string('industry_type');
            $table->string('source');
            $table->string('requirement_type');

            $table->string('budget_range');
            $table->enum('urgency', ['Low', 'Medium', 'High']);
            $table->enum('status', ['New', 'Contacted', 'Qualified', 'Quoted', 'Lost']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
