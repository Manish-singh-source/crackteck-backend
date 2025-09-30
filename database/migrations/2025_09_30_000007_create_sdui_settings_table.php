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
        Schema::create('sdui_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 255)->unique()->comment('Setting key identifier');
            $table->text('value')->nullable()->comment('Setting value');
            $table->string('type', 50)->default('string')->comment('Data type: string, json, boolean, integer');
            $table->text('description')->nullable()->comment('Setting description');
            $table->string('group', 100)->default('general')->comment('Setting group for organization');
            $table->timestamps();

            // Indexes
            $table->index('key');
            $table->index('group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdui_settings');
    }
};

