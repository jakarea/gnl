<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Earning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Exceptions\MissingAbilityException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Crypt;

class UserController extends API\ApiController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $creds = $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'confirm_password' => 'required_with:password|same:password|min:6',
                'full_name' => 'required|string',

            ]);
        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e, 422, 'Validation error', 1001);
        }

        $verificationCode = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $user = User::create([
            'name' => $creds['name'],
            'email' => $creds['email'],
            'password' => Hash::make($creds['password']),
            'kvk_number' => $creds['kvk_number'] ?? null,
            'verification_code' => $verificationCode,
            'email_verified_at' => null,
            'status' => 0,
        ]);

        $role = Role::where('slug', $creds['role'])->first();
        $user->roles()->attach($role);

        if ($role->slug == 'company') {
            $company = Company::create([
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id
            ]);

            $company->save();
        }

         // Send verification email
         try {
            $this->sendVerificationEmail($user, $verificationCode);
        } catch (\Exception  $e) {
            $user->roles()->detach();
            $user->delete();
            return response()->json([
                'error' => 500,
                'message' => 'Failed to send verification email ',
                'errors' => $e->getMessage(),
            ], 200);
        }

        // return $user;
        return $this->jsonResponse(false, $this->success, $user, $this->emptyArray, JsonResponse::HTTP_CREATED);
    }

    protected function validationErrorResponse(ValidationException $e, $status, $message, $errorCode): JsonResponse
    {
        return response()->json([
            'error' => $errorCode,
            'message' => $message,
            'errors' => $e->validator->errors(),
        ], $status);
    }

    protected function sendVerificationEmail(User $user, $verificationCode)
    {
        // Use your email template and customize as needed
        Mail::to($user->email)->send(new VerificationMail($user,$verificationCode));
    }

    /**
     * Authenticate an user and dispatch token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {


        try {
            $creds = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
                // 'role' => 'required|exists:roles,slug',
            ]);

        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e, 422, 'Validation error', 1001);
        }

        $user = User::where('email', $creds['email'])->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response(['error' => 1, 'message' => 'Invalid credentials'], 401);
        }


        if (config('hydra.delete_previous_access_tokens_on_login', false)) {
            $user->tokens()->delete();
        }

        $roles = $user->roles->pluck('slug')->all();

        $plainTextToken = $user->createToken('hydra-api-token', $roles)->plainTextToken;

        // return $user;
        $plainTextToken = $user->createToken('hydra-token')->plainTextToken;

        $userInfo = [
            'token' => $plainTextToken,
            'user_info' => [
                'id' => $user->user_id,
                'name' => $user->full_name,
                'email' => $user->email,
            ],
        ];

        return $this->jsonResponse(false, $this->success, $userInfo, $this->emptyArray, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \App\Models\User  $user
     */
    public function show(User $user) {
        $userInfo = $user;
        return $this->jsonResponse(false, $this->success, $userInfo, $this->emptyArray, JsonResponse::HTTP_CREATED);
    }

    public function edit(User $user) {
        $userInfo = $user;
        return $this->jsonResponse(false, $this->success, $userInfo, $this->emptyArray, JsonResponse::HTTP_CREATED);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return User
     *
     * @throws MissingAbilityException
     */
    public function update(Request $request, User $user) {

        $user->full_name = $request->full_name ?? $user->full_name;
        $user->email = $request->email ?? $user->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->email_verified_at = $request->email_verified_at ?? $user->email_verified_at;
        $user->designation = $request->designation ?? $user->designation;
        $user->birth = $request->birth ?? $user->birth;

        $user->phone = $request->phone ?? $user->phone;
        $user->nationality = $request->nationality ?? $user->nationality;
        $user->marital_status = $request->marital_status ?? $user->marital_status;
        $user->address = $request->address ?? $user->address;

        $user->country = $request->country ?? $user->country;
        $user->city = $request->city ?? $user->city;
        $user->state = $request->state ?? $user->state;
        $user->post_code = $request->post_code ?? $user->post_code;

        //check if the logged in user is updating it's own record

        $loggedInUser = $request->user();

        if ($loggedInUser->user_id == $user->user_id) {
            $user->update();
        } elseif ($loggedInUser->tokenCan('admin') || $loggedInUser->tokenCan('super-admin')) {
            $user->update();
        } else {
            throw new MissingAbilityException('Not Authorized');
        }
        return $user;
    }

    public function updatePassword(Request $request, User $user)
    {
        try {
            $request->validate([
                'new_password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-zA-Z])(?=.*\d)/',
                ],
                'confirm_password' => 'required|same:new_password',
            ], [
                'new_password.regex' => 'Ensure that the password contains at least one letter and one number.',
            ]);


            // Update the user's password
            $user->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

            return $this->jsonResponse(0, 'Password updated successfully.');

        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e, 422, 'Validation error', 1001);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $adminRole = Role::where('slug', 'admin')->first();
        $userRoles = $user->roles;

        if ($userRoles->contains($adminRole)) {
            //the current user is admin, then if there is only one admin - don't delete
            $numberOfAdmins = Role::where('slug', 'admin')->first()->users()->count();
            if (1 == $numberOfAdmins) {
                return response(['error' => 1, 'message' => 'Create another admin before deleting this only admin user'], 409);
            }
        }

        $user->delete();

        return response(['error' => 0, 'message' => 'user deleted']);
    }


    /**
     * Return Auth user
     *
     * @param  Request  $request
     * @return mixed
     */
    public function me(Request $request) {
        return $request->user();
    }
}
