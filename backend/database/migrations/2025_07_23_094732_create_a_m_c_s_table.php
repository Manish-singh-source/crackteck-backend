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
        Schema::create('a_m_c_s', function (Blueprint $table) {
            $table->id();

            $table->string('plan_name');
            $table->string('plan_code');
            $table->string('plan_type');
            $table->string('description')->nullable();
            $table->string('duration');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('total_visits');
            $table->string('plan_cost');
            $table->string('tax');
            $table->string('total_cost');
            $table->string('pay_terms');
            $table->string('support_type');
            $table->string('replacement_policy')->nullable();
            $table->string('items');
            $table->string('brochure')->nullable();
            $table->string('tandc')->nullable();
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_m_c_s');
    }
};
