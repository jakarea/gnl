<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Registration
    public function showRegistrationForm()
    {
        return redirect(route('login'));
        return view('auth.register');
    }

    public function register(RegistrationRequest $request)
    {
        $user = User::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin', // Set the user role as 'admin'
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password','remember');
        $remember = $request->boolean('remember');
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['error' => 'Invalid credentials.']);
    }


    // public function socialLogin($social)
    // {
    //     return Socialite::driver($social)->redirect();
    // }

    // public function handleProviderCallback($social)
    // {

    // }







    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
