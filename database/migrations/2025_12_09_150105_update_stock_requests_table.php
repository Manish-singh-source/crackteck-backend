<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stock_requests', function (Blueprint $table) {
            // Drop FK and index only if they exist
            if (Schema::hasColumn('stock_requests', 'requested_by')) {
                $table->dropForeign(['requested_by']);
                $table->dropIndex(['requested_by']);
                $table->dropColumn('requested_by');
            }

            // Recreate the column with new FK
            $table->foreignId('requested_by')
                ->constrained('engineers')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('stock_requests', function (Blueprint $table) {
            // Drop new FK
            $table->dropForeign(['requested_by']);
            $table->dropIndex(['requested_by']);
            $table->dropColumn('requested_by');

            // Recreate old column with old FK
            $table->foreignId('requested_by')
                ->constrained('users')
                ->onDelete('cascade');
        });
    }
};
