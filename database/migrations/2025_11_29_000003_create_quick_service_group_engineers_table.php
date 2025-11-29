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
        Schema::create('quick_service_group_engineers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assignment_id');
            $table->unsignedBigInteger('engineer_id');
            $table->boolean('is_supervisor')->default(false);
            $table->timestamps();

            // Foreign keys with custom names
            $table->foreign('assignment_id', 'qs_grp_eng_assignment_fk')
                  ->references('id')->on('quick_service_engineer_assignments')->onDelete('cascade');
            $table->foreign('engineer_id', 'qs_grp_eng_engineer_fk')
                  ->references('id')->on('engineers')->onDelete('cascade');

            // Indexes with custom names
            $table->index('assignment_id', 'qs_grp_eng_assignment_idx');
            $table->index('engineer_id', 'qs_grp_eng_engineer_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_service_group_engineers');
    }
};

