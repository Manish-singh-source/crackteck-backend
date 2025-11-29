<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify the status enum to include 'Transferred'
        DB::statement("ALTER TABLE amc_visit_engineer_assignments MODIFY COLUMN status ENUM('Active', 'Inactive', 'Completed', 'Transferred') DEFAULT 'Active'");
        
        // Add transferred_to field to track which engineer the assignment was transferred to
        Schema::table('amc_visit_engineer_assignments', function (Blueprint $table) {
            $table->foreignId('transferred_to')->nullable()->after('status')->constrained('amc_visit_engineer_assignments')->onDelete('set null');
            $table->timestamp('transferred_at')->nullable()->after('transferred_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amc_visit_engineer_assignments', function (Blueprint $table) {
            $table->dropForeign(['transferred_to']);
            $table->dropColumn(['transferred_to', 'transferred_at']);
        });
        
        // Revert the status enum
        DB::statement("ALTER TABLE amc_visit_engineer_assignments MODIFY COLUMN status ENUM('Active', 'Inactive', 'Completed') DEFAULT 'Active'");
    }
};

