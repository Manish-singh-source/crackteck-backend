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
        Schema::table('quotation_amc_details', function (Blueprint $table) {
            //
            if (Schema::hasColumn('quotation_amc_details', 'amc_type')) {
                $table->dropColumn(['amc_type', 'amc_amount', 'start_date', 'end_date', 'terms_conditions']);
            }
            // Add amc_plan_id column if it doesn't exist
            if (!Schema::hasColumn('quotation_amc_details', 'amc_plan_id')) {
                $table->unsignedBigInteger('amc_plan_id')->after('quotation_id');
            }

            // Add foreign key
            $table->foreign('amc_plan_id')
                ->references('id')
                ->on('a_m_c_s')
                ->onDelete('cascade');
                
            $table->string('plan_duration')->nullable()->after('amc_plan_id');
            $table->decimal('total_amount', 10, 2)->nullable()->after('plan_duration');
            $table->date('plan_start_date')->nullable()->after('total_amount');
            $table->date('plan_end_date')->nullable()->after('plan_start_date');
            $table->string('priority_level')->nullable()->after('total_amount');
            $table->text('additional_notes')->nullable()->after('priority_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_amc_details', function (Blueprint $table) {
            //
            $table->dropForeign('amc_plan_id');
            $table->dropColumn(['amc_plan_id', 'plan_duration','total_amount','plan_start_date', 'plan_end_date', 'priority_level', 'additional_notes']);
        });
    }
};
