<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $data = $request->except(['avatar']);

        $user->update($data);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete("users/{$user->avatar}");
            }
            $avatar = $request->file('avatar');
            $filename = substr(md5(time()), 0, 10) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('users', $filename, 'public');
            $user->update(['avatar' => 'storage/'. $avatarPath]);
        }


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
