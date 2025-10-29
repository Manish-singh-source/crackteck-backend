<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Only add the column if it doesn't already exist
        if (!Schema::hasColumn('quotations', 'user_id')) {
            Schema::table('quotations', function (Blueprint $table) {
                // Use unsignedBigInteger to match Laravel default user id type
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('quotations', 'user_id')) {
            Schema::table('quotations', function (Blueprint $table) {
                // Drop foreign key first, then column
                try {
                    $table->dropForeign(['user_id']);
                } catch (\Exception $e) {
                    // ignore if foreign key doesn't exist
                }
                $table->dropColumn('user_id');
            });
        }
    }
}
