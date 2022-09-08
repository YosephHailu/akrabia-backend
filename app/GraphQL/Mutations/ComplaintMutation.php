<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Office;

final class ComplaintMutation
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
        $data = collect($args)->only(['first_name', 'last_name', 'gender', 'phone_number', 'email', 'complaint_description', 'custom_complaint',
            'rating', 'file_name', 'complaint_type', 'defined_complaint_id']);
        
        if(Str::lower($args['complaintable']['type']) == "office") {
            $office = Office::find($args['complaintable']['connect']);
            $complaint = $office->complaints()->create($data->toArray());
            $office->avg_rating = $office->complaints()->sum('rating') / $office->complaints()->count();
            $office->save();
        }

        else if(Str::lower($args['complaintable']['type']) == "staff") {
            $staff = Staff::find($args['complaintable']['connect']);
            $complaint = $staff->complaints()->create($data->toArray());
            $staff->avg_rating = $staff->complaints()->sum('rating') / $staff->complaints()->count();
            $staff->save();

        }

        return $complaint;
        return $this->getSurvey($complaint);
    }

    public function getSurvey($complaint)
    {
        $surveyPolicies = SurveyPolicy::where([['is_active', true]]);
        //Gender Filter
        $surveyPolicies->where('gender', null)->orWhere('gender', $complaint->gender);

        //Region Filter
        if($complaint->complaintable_type == Office::class) {
            $office = Office::find($complaint->complaintable_id);
            $surveyPolicies = SurveyPolicy::where([['is_active', true]])
                ->where('region_id', null)
                ->orWhere('region_id', $office->region_id)->whereIn('id', $surveyPolicies->pluck('id'));
        }

        if($complaint->complaintable_type == Staff::class) {
            $staff = Staff::find($complaint->complaintable_id);
            $surveyPolicies = SurveyPolicy::where([['is_active', true]])
                ->where('region_id', null)
                ->orWhere('region_id', $staff->office->region_id)->whereIn('id', $surveyPolicies->pluck('id'));
        }

        $surveyPolicies->where([['min_rating', '<=', $complaint->rating], ['max_rating', '>=', $complaint->rating]]);

        Log::debug($surveyPolicies->get());

        if($surveyPolicies->first())
            return $surveyPolicies->first()->survey;
        
        return null;

    }

}
