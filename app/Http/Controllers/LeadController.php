<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function hosting(){
        return view('lead/hosting');
    }

    public function hostingAll(){
        return view('lead/hosting-all');
    }

    public function marketing(){
        return view('lead/marketing');
    }

    public function project(){
        return view('lead/project');
    }

    public function website(){
        return view('lead/website');
    }

    public function lost(){
        return view('lead/lost');
    }
}
