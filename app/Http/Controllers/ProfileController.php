<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //


    public function index()
    {
        $data['user'] = auth()->user();
        return view('profile/admin/profile', $data);
    }

    public function settings()
    {
        $data['user'] = auth()->user();
        return view('profile/admin/settings', $data);
    }

    public function settingsUpdate(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'designation'=>'required',
            'birth'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'nationality'=>'required',
            'marital_status'=>'required',
        ]);

        $user = auth()->user();
        $user->update($request->all());
        return redirect(route('account.index'))->withSuccess('User info updated!!');
    }

    public function address()
    {
        $data['user'] = auth()->user();
        return view('profile/admin/address-settings', $data);
    }

    public function addressUpdate(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'country'=>'required',
            'city'=>'required',
            'state'=>'required',
            'post_code'=>'required'
        ]);

        $user = auth()->user();
        $user->update($request->all());
        return redirect(route('account.index'))->withSuccess('User data updated!!');
    }


}
