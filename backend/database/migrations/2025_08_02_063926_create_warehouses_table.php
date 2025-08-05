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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_name');
            $table->string('warehouse_type');
            $table->string('warehouse_addr1');
            $table->string('warehouse_addr2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode', 6);
            $table->string('contact_person_name');
            $table->string('phone_number', 10);
            $table->string('alternate_phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('working_hours')->nullable();
            $table->string('working_days')->nullable();
            $table->integer('max_store_capacity')->nullable();
            $table->text('supported_operations')->nullable();
            $table->text('zone_conf')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('licence_no')->nullable();
            $table->string('licence_doc')->nullable();
            $table->boolean('default_warehouse')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
