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
        // First, check for and resolve any duplicate sort_order values
        $this->resolveDuplicateSortOrders();
        
        // Then add the unique constraint
        Schema::table('parent_categories', function (Blueprint $table) {
            $table->unique('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parent_categories', function (Blueprint $table) {
            $table->dropUnique(['sort_order']);
        });
    }

    /**
     * Resolve any duplicate sort_order values before adding unique constraint
     */
    private function resolveDuplicateSortOrders(): void
    {
        // Find all duplicate sort_order values
        $duplicates = DB::table('parent_categories')
            ->select('sort_order', DB::raw('count(*) as count'))
            ->groupBy('sort_order')
            ->having('count', '>', 1)
            ->get();

        if ($duplicates->count() > 0) {
            echo "Found duplicate sort_order values. Resolving...\n";
            
            // Get the maximum sort_order value
            $maxSortOrder = DB::table('parent_categories')->max('sort_order') ?? 0;
            
            foreach ($duplicates as $duplicate) {
                // Get all records with this duplicate sort_order
                $records = DB::table('parent_categories')
                    ->where('sort_order', $duplicate->sort_order)
                    ->orderBy('id')
                    ->get();
                
                // Keep the first record with the original sort_order
                // Update the rest with new unique values
                foreach ($records->skip(1) as $record) {
                    $maxSortOrder++;
                    DB::table('parent_categories')
                        ->where('id', $record->id)
                        ->update(['sort_order' => $maxSortOrder]);
                    
                    echo "Updated category ID {$record->id} sort_order from {$duplicate->sort_order} to {$maxSortOrder}\n";
                }
            }
            
            echo "Duplicate sort_order values resolved.\n";
        }
    }
};
