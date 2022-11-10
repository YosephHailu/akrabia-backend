<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use App\Models\JobPreference;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider = Provider::create([
            'name' => "Meron Kenean",
            'badge_id' => "AKR-8756-ETH1",
            "location" => collect([ 
                'lat' => 8.9806,
                "lng" => 38.7578
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://i.pinimg.com/736x/f2/30/a1/f230a1dbad5610d0563fbf51b4c7bdf4.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[1]->id,
            'employment_type' => "full time",
            'amount' => 150
        ]);

        $provider = Provider::create([
            'name' => "Mustefa Murad",
            'badge_id' => "KSAD-5956-ETH",
            "location" => collect([ 
                'lat' => 8.9816,
                "lng" => 38.7278
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://i.pinimg.com/originals/b6/97/94/b69794d11e3c729a4367ef34dde9882b.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[2]->id,
            'employment_type' => "part time",
            'amount' => 150
        ]);

        $provider = Provider::create([
            'name' => "Abera Mebratu",
            'badge_id' => "POAS-5956-ETH",
            "location" => collect([ 
                'lat' => 8.9616,
                "lng" => 38.7178
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('http://3.bp.blogspot.com/_6izHM7-NzcQ/TL1URwtHGiI/AAAAAAAABDk/_1hgdsATWXY/s1600/half+Scottish-Finnish,+half+Ethiopian.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[1]->id,
            'employment_type' => "full time",
            'amount' => 150
        ]);

        $provider = Provider::create([
            'name' => "Abel Mulgeta",
            'badge_id' => "DASD-5956-ETH",
            "location" => collect([ 
                'lat' => 8.9716,
                "lng" => 38.7978
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://pbs.twimg.com/media/D1U5FseWoAE8JbL?format=jpg&name=small')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[2]->id,
            'employment_type' => "full time",
            'amount' => 150
        ]);

        $provider = Provider::create([
            'name' => "Kalab Kirubel",
            'badge_id' => "KAsSD-5956-ETH",
            "location" => collect([ 
                'lat' => 9.009393552970936,
                "lng" => 38.72689797490238
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[0]->id,
            'employment_type' => "full time",
            'amount' => 150
        ]);

        $provider->addMediaFromUrl('http://3.bp.blogspot.com/_6izHM7-NzcQ/TL1URwtHGiI/AAAAAAAABDk/_1hgdsATWXY/s1600/half+Scottish-Finnish,+half+Ethiopian.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $provider = Provider::create([
            'name' => "Mulgeta Amare",
            'badge_id' => "DIOOIASD-5956-ETH",
            "location" => collect([ 
                'lat' => 9.012127432140604,
                "lng" => 38.7389142712891
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://allaboutethio.com/images/marcus-samuelsson.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[0]->id,
            'employment_type' => "full time",
            'amount' => 150
        ]);

        // change 1

        $provider = Provider::create([
            'name' => "Kenean Alemayew",
            'badge_id' => "AKR-8756-ETH" . $provider->id,
            "location" => collect([ 
                'lat' => 8.9906,
                "lng" => 38.7278
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://i.pinimg.com/736x/f2/30/a1/f230a1dbad5610d0563fbf51b4c7bdf4.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[1]->id,
            'employment_type' => "full time",
            'amount' => 120
        ]);

        $provider = Provider::create([
            'name' => "Mahlet",
            'badge_id' => "AKR-8756-ETH" . $provider->id,
            "location" => collect([ 
                'lat' => 8.9506,
                "lng" => 38.7378
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://i.pinimg.com/736x/f2/30/a1/f230a1dbad5610d0563fbf51b4c7bdf4.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[4]->id,
            'employment_type' => "full time",
            'amount' => 620
        ]);

        $provider = Provider::create([
            'name' => "Nardos",
            'badge_id' => "AKR-8756-ETH" . $provider->id,
            "location" => collect([ 
                'lat' => 8.9596,
                "lng" => 38.7308
            ]),
            'verified' => true,
            'description' => "As a satellite dish installer, your job is to install and configure satellite dishes in a way that ensures they get a strong signal.",
        ]);

        $provider->addMediaFromUrl('https://i.pinimg.com/736x/f2/30/a1/f230a1dbad5610d0563fbf51b4c7bdf4.jpg')->toMediaCollection('PROVIDER_PHOTO');

        $jobPreference = JobPreference::firstOrCreate([
            'provider_id' => $provider->id,
            'job_category_id' => JobCategory::get()[5]->id,
            'employment_type' => "full time",
            'amount' => 320
        ]);

    }
}
