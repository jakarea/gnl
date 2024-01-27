<?php

namespace App\Process;

use App\Http\Requests\LeadType\StoreRequest;
use App\Models\LeadType;
use App\Traits\FileTrait;
use App\Traits\SlugTrait;

class LeadTypeProcess{

    use SlugTrait, FileTrait;

    public static function create(StoreRequest $request)
    {
        $leadType = new LeadType();
        $leadType->name = $request->name;
        $leadType->slug = (new self())->makeUniqueSlug($request->name,'LeadType');
        // $leadType->created_by = auth()->user()->id;
        $leadType->save();
        return $leadType;
    }
}
