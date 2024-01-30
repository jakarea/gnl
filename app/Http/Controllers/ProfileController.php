<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index()
    {
        return view('profile/admin/profile');
    }

    public function settings()
    {
        return view('profile/admin/settings');
    }
    public function address()
    {
        return view('profile/admin/address-settings');
    }
}