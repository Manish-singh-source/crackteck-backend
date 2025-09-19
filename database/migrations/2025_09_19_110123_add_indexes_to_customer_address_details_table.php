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
        Schema::table('customer_address_details', function (Blueprint $table) {
            // Add index for better performance when querying branches by customer
            $table->index('customer_id');

            // Add a flag to mark primary branch (optional)
            $table->boolean('is_primary')->default(false)->after('pincode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_address_details', function (Blueprint $table) {
            $table->dropIndex(['customer_id']);
            $table->dropColumn('is_primary');
        });
    }
};
