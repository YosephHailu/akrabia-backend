<?php

namespace App\GraphQL\Mutations;

use App\Models\JobPreference;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

final class JobPreferenceMutation
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

        $job = JobPreference::create([
            'employment_type' => $args['employment_type'],
            'amount' => $args['amount'],
            'job_category_id' => $args['jobCategory']['connect'],
            'user_id' => Auth::id()
        ]);

        return $job;
    }

}
