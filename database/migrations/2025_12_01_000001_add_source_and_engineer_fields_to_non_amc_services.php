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
            // Add customer_id reference
            $table->foreignId('customer_id')->nullable()->after('id')->constrained('customers')->onDelete('set null');
            
            // Add source_type to track where the request came from
            $table->enum('source_type', [
                'ecommerce_non_amc_page',
                'customer_installation_page',
                'customer_repairing_page',
                'admin_panel'
            ])->default('admin_panel')->after('customer_id');
            
            // Add engineer assignment fields
            $table->foreignId('assigned_engineer_id')->nullable()->after('status')->constrained('engineers')->onDelete('set null');
            $table->foreignId('previous_engineer_id')->nullable()->after('assigned_engineer_id')->constrained('engineers')->onDelete('set null');
            
            // Add problem_type field
            $table->enum('problem_type', ['Installation', 'Repair', 'Other'])->nullable()->after('service_type');
            
            // Add remarks field
            $table->text('remarks')->nullable()->after('additional_notes');
            
            // Add requested_at timestamp
            $table->timestamp('requested_at')->nullable()->after('created_by');
            
            // Add indexes
            $table->index('customer_id');
            $table->index('source_type');
            $table->index('assigned_engineer_id');
            $table->index('requested_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('non_amc_services', function (Blueprint $table) {
            // Drop indexes first
            $table->dropIndex(['customer_id']);
            $table->dropIndex(['source_type']);
            $table->dropIndex(['assigned_engineer_id']);
            $table->dropIndex(['requested_at']);
            
            // Drop foreign keys
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['assigned_engineer_id']);
            $table->dropForeign(['previous_engineer_id']);
            
            // Drop columns
            $table->dropColumn([
                'customer_id',
                'source_type',
                'assigned_engineer_id',
                'previous_engineer_id',
                'problem_type',
                'remarks',
                'requested_at'
            ]);
        });
    }
};

