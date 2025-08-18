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
        Schema::table('engineers', function (Blueprint $table) {
            //
             $table->enum('police_verification', ['Yes', 'No'])->comment('1: Yes , 2: No')->nullable();
            $table->enum('police_verification_status', ['Pending', 'Completed'])->comment('1: Pending , 2: Completed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineers', function (Blueprint $table) {
            //
            $table->dropColumn('police_verification');
            $table->dropColumn('police_verification_status');
        });
    }
};
