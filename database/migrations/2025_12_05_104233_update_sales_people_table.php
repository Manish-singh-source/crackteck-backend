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
        Schema::table('sales_people', function (Blueprint $table) {
            //
            $table->string('vehicle_type')->nullable()->change();
            $table->string('vehical_no')->nullable()->change();
            $table->string('driving_license_no')->nullable()->change();
            $table->string('driving_license')->nullable()->change();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_people', function (Blueprint $table) {
            //
            $table->string('vehicle_type')->change();
            $table->string('vehical_no')->change();
            $table->string('driving_license_no')->change();
            $table->string('driving_license')->change();
        });
    }
};
