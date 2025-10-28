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
        Schema::table('amc_services', function (Blueprint $table) {
            //
             $table->string('plan_type')->nullable()->after('amc_plan_id');
            $table->boolean('terms_agreed')->default(false)->after('additional_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amc_services', function (Blueprint $table) {
            //
            $table->dropColumn(['plan_type', 'terms_agreed']);
        });
    }
};
