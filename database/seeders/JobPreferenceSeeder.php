<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use App\Models\JobPreference;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => Provider::inRandomOrder()->first()->id,
            'job_category_id' => JobCategory::inRandomOrder()->first()->id,
            'employment_type' => "Full time",
            'amount' => 1568
        ]);

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => Provider::inRandomOrder()->first()->id,
            'job_category_id' => JobCategory::inRandomOrder()->first()->id,
            'employment_type' => "Part time",
            'amount' => 8987
        ]);

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => Provider::inRandomOrder()->first()->id,
            'job_category_id' => JobCategory::inRandomOrder()->first()->id,
            'employment_type' => "Full time",
            'amount' => 354
        ]);

        // $jobPreference->addMediaFromDisk('folder/dish.jpeg')->toMediaCollection('JOB_PREFERENCE_PHOTO');
    }
}
