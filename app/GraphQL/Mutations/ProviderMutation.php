<?php

namespace App\GraphQL\Mutations;

use App\Models\Provider;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final class ProviderMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function store($rootValue, array $args)
    {
        Log::debug($args);
        $data = collect($args)->only(['name', 'description']);
        $data['badge_id'] = Str::upper($data['name'])."-". rand(10000, 99999);
        $data['location'] = collect(['lat' => $args['lat'], 'lng' => $args['lng']]);
        $provider = Provider::create($data->toArray());

        try {
            if($args['image']){
                $provider->addMedia($args['image'])->toMediaCollection("PROVIDER_IMAGE");
            }
        } catch(Exception $exception) {}
        
        return $provider;
    }

    public function update($rootValue, array $args)
    {
        $data = collect($args)->only(['name', 'description']);
        $provider = Provider::find($args['id']);
        $provider->update($data->toArray());

        try {
            if($args['image']){
                $provider->media()->delete();
                $provider->addMedia($args['image'])->toMediaCollection("PROVIDER_IMAGE");
            }
        } catch(Exception $exception) {}
        
        return $provider;
    }
}
