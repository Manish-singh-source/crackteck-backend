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
            $table->string('aadhar_pic')->nullable()->after('pic');
            $table->string('pan_card')->nullable()->after('aadhar_pic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineers', function (Blueprint $table) {
            //
            $table->dropColumn(['aadhar_pic', 'pan_card']);
        });
    }
};
