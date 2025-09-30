<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * This migration converts existing component-based pages to the new JSON schema format.
     * It reads all components for each page and creates a complete JSON schema.
     */
    public function up(): void
    {
        // Get all pages
        $pages = DB::table('sdui_pages')->whereNull('deleted_at')->get();

        foreach ($pages as $page) {
            // Get all components for this page
            $components = DB::table('sdui_components')
                ->where('page_id', $page->id)
                ->whereNull('deleted_at')
                ->orderBy('order')
                ->get();

            // Build the JSON schema
            $jsonSchema = [
                'version' => '1.0',
                'metadata' => [
                    'title' => $page->title,
                    'description' => $page->description,
                    'screen_type' => $page->screen_type,
                ],
                'components' => [],
                'layout' => [
                    'type' => 'vertical',
                    'spacing' => 16,
                ],
            ];

            // Convert each component to the new format
            foreach ($components as $component) {
                $componentData = [
                    'id' => 'component_' . $component->id,
                    'type' => $component->type,
                    'order' => $component->order,
                    'props' => json_decode($component->props, true) ?? [],
                    'is_active' => (bool) $component->is_active,
                ];

                // Get roles for this component
                $componentRoles = DB::table('sdui_component_role')
                    ->join('roles', 'sdui_component_role.role_id', '=', 'roles.id')
                    ->where('sdui_component_role.component_id', $component->id)
                    ->pluck('roles.name')
                    ->toArray();

                if (!empty($componentRoles)) {
                    $componentData['roles'] = $componentRoles;
                }

                $jsonSchema['components'][] = $componentData;
            }

            // Update the page with the new JSON schema
            DB::table('sdui_pages')
                ->where('id', $page->id)
                ->update([
                    'json_schema' => json_encode($jsonSchema),
                    'updated_at' => now(),
                ]);
        }

        // $this->command->info('Successfully migrated ' . $pages->count() . ' pages to JSON schema format.');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Clear json_schema from all pages
        DB::table('sdui_pages')->update(['json_schema' => null]);
        
        // $this->command->info('Cleared JSON schemas from all pages.');
    }
};

