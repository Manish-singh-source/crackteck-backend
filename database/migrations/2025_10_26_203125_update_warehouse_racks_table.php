<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('warehouse_racks', function (Blueprint $table) {
            //
            $table->integer('filled_quantity')->default(0)->after('quantity'); 
        });

        // DB::statement('ALTER TABLE warehouse_racks ADD CONSTRAINT chk_filled_quantity CHECK (filled_quantity <= quantity)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DB::statement('ALTER TABLE warehouse_racks DROP CONSTRAINT chk_filled_quantity');
        
        Schema::table('warehouse_racks', function (Blueprint $table) {
            //
            $table->dropColumn('filled_quantity');
        });

    }
};
