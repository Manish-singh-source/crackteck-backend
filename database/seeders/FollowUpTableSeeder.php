<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FollowUp;
use App\Models\Lead;

class FollowUpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $leads = Lead::all();

        // foreach ($leads as $lead) {
        //     FollowUp::factory()->count(1)->for($lead)->create();
        // }
        FollowUp::factory()->count(20)->make()->each(function ($followup) use ($leads) {
            $lead = $leads->random();
            $followup->lead_id = $lead->id;
            $followup->save();
        });
    }
}
