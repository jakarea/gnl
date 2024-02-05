<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class SearchService
{
    public static function search(Model $model, $request, $searchFields)
    {

        if (is_string($request)) {
            $request = request()->merge(['q' => $request]);
        }

        // Check again if $request is an instance of Request
        if (!($request instanceof Request)) {
            throw new \InvalidArgumentException('$request must be an instance of Illuminate\Http\Request');
        }

        $query = $model::query();

        foreach ($searchFields as $field) {

            if ($request->filled($field)) {

                dd($request->input($field));

                $value = $request->input($field);
                $query->where($field, 'like', '%' . $value . '%');
            }
        }

        return $query;
    }
}
