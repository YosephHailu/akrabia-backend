<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $provider = Provider::firstOrCreate([
            'name' => "Dish fixer",
        ], [
            'badge_id' => "AKR-8756-ETH",
            "location" => collect([ 
                'lat' => 8.9806,
                "lng" => 38.7578
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromDisk('folder/dish.jpeg')->toMediaCollection('PROVIDER_PHOTO');

    }
}
