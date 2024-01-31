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
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->linkedin = $request->linkedin;
        $lead->instagram = $request->instagram;
        $lead->company = $request->company;
        $lead->website = $request->website;
        $lead->kvk = $request->kvk;
        $lead->lead_type_id = $request->lead_type_id; 
        $lead->note = $request->note;
        $lead->lead_order = '';
        $lead->state = 'new';
        $lead->status = 'active';
        $lead->save();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = substr(md5(time()), 0, 10) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('leads', $filename, 'public');
            $lead->update(['avatar' => 'storage/' . $avatarPath]);
        }

        return $lead;
    }
}
