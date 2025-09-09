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
        Schema::table('customers', function (Blueprint $table) {
            //
            $table->string('branch_name')->nullable();
            $table->string('pic')->nullable();
            $table->enum('customer_type', ['Retail', 'Wholesale' ,"Corporate"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
            $table->dropColumn('pic');
            $table->dropColumn('customer_type');
        });
    }
};
