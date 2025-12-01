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
        Schema::table('non_amc_services', function (Blueprint $table) {
            //
            $table->renameColumn('company_address', 'branch_name')->nullable();
            $table->boolean('terms_agreed')->default(false)->after('additional_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('non_amc_services', function (Blueprint $table) {
            //
            $table->renameColumn('branch_name', 'company_address');
            $table->dropColumn('terms_agreed');
        });
    }
};
