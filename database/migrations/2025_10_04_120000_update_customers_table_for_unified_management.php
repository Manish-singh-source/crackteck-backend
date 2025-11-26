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
        Schema::table('customers', function (Blueprint $table) {
            // Add user_id to link with users table for e-commerce customers
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->onDelete('set null');
            
            // Add username field for display purposes
            $table->string('username')->nullable()->unique()->after('email');
            
            // Make business-related fields nullable for e-commerce customers
            $table->string('company_name')->nullable()->change();
            $table->string('company_addr')->nullable()->change();
            $table->string('gst_no')->nullable()->change();
            $table->string('pan_no')->nullable()->change();
            
            // Make personal fields more flexible
            $table->date('dob')->nullable()->change();
            $table->string('phone', 20)->change(); // Allow longer phone numbers
            
            // Add soft delete support
            $table->softDeletes();
            
            // Add indexes for better performance
            $table->index('user_id');
            $table->index('customer_type');
            $table->index('status');
        });

        // Update the customer_type enum to include new values
        // DB::statement("ALTER TABLE customers MODIFY COLUMN customer_type ENUM('E-commerce Customer', 'AMC Customer', 'Both') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Remove indexes
            $table->dropIndex(['user_id']);
            $table->dropIndex(['customer_type']);
            $table->dropIndex(['status']);
            
            // Remove soft deletes
            $table->dropSoftDeletes();
            
            // Remove new fields
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('username');
            
            // Revert field changes (make required again)
            $table->string('company_name')->nullable(false)->change();
            $table->string('company_addr')->nullable(false)->change();
            $table->string('gst_no')->nullable(false)->change();
            $table->string('pan_no')->nullable(false)->change();
            $table->date('dob')->nullable(false)->change();
            $table->string('phone', 10)->change();
        });

        // Revert customer_type enum to original values
        // DB::statement("ALTER TABLE customers MODIFY COLUMN customer_type ENUM('Retail', 'Wholesale', 'Corporate') NOT NULL");
    }
};
