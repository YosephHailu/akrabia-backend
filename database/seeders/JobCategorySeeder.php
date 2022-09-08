<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jobCategory = JobCategory::firstOrCreate([
            'name' => "Solar panel fixer",
            'description' => "Electrical Installation Work provides a topic by topic progression through the areas of electrical installations, including how and why electrical installations",
        ]);

        $jobCategory->addMediaFromUrl('https://oddatech.com/solar.gif')->toMediaCollection('JOB_CATEGORY_ICON');

        $jobCategory = JobCategory::firstOrCreate([
            'name' => "Electrician",
            'description' => "Electrical Installation Work provides a topic by topic progression through the areas of electrical installations, including how and why electrical installations",
        ]);

        $jobCategory->addMediaFromUrl('https://oddatech.com/electric.gif')->toMediaCollection('JOB_CATEGORY_ICON');

        $jobCategory = JobCategory::firstOrCreate([
            'name' => "Dish fixer",
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $jobCategory->addMediaFromUrl('https://oddatech.com/dish.gif')->toMediaCollection('JOB_CATEGORY_ICON');

        $jobCategory = JobCategory::firstOrCreate([
            'name' => "Network installer",
            'description' => "Networking installation and management services from INS can help you upgrade an existing network or design and install a new one.",
        ]);
        $jobCategory->addMediaFromUrl('https://oddatech.com/network.gif')->toMediaCollection('JOB_CATEGORY_ICON');

        $jobCategory = JobCategory::firstOrCreate([
            'name' => "Software installation",
            'description' => "Electrical Installation Work provides a topic by topic progression through the areas of electrical installations, including how and why electrical installations",
        ]);

        $jobCategory->addMediaFromUrl('https://oddatech.com/network.gif')->toMediaCollection('JOB_CATEGORY_ICON');

        $jobCategory = JobCategory::firstOrCreate([
            'name' => "Photographer",
            'description' => "Electrical Installation Work provides a topic by topic progression through the areas of electrical installations, including how and why electrical installations",
        ]);

        $jobCategory->addMediaFromUrl('https://oddatech.com/camera.gif')->toMediaCollection('JOB_CATEGORY_ICON');

    }
}
