<?php

namespace App\Process;

use App\Http\Requests\Lead\LeadStoreRequest;

use App\Models\Lead;
use App\Traits\FileTrait;
use App\Traits\SlugTrait;

class LeadProcess {

    use SlugTrait, FileTrait;

    public static function create(LeadStoreRequest $request)
    {
        $lead = new Lead();
        $lead->avatar = $request->avatar;
        $lead->name = $request->name;
        $lead->lead_type_id = $request->lead_type_id;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->linkedin = $request->linkedin;
        $lead->instagram = $request->instagram;
        $lead->socials = $request->socials;
        $lead->company = $request->company;
        $lead->website = $request->website;
        $lead->kvk = $request->kvk;
        $lead->note = $request->note;


        $lead->save();

        return $lead;
    }
}
