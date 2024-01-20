<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /** 
     * Show registration form
     * 
    */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /** 
     * Registration method
     * 
    */
    public function register(RegistrationRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create($validatedData);

        if($user) {
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occure while trying to create user'
            ], 500);
        }
    }

    /** 
     * Return JWT Token
     * 
    */
    public function responseWithToken($token, $user)
    {
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }
}
