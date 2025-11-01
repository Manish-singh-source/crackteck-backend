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
        Schema::table('contacts', function (Blueprint $table) {
            //
            // $table->string('phone')->nullable()->after('email');
            // $table->text('message')->nullable()->after('phone');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['subject', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->text('message')->change();
            $table->string('subject');
            $table->text('description');
        });
    }
};
