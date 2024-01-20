<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /** 
     * Show Login form
     * 
    */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /** 
     * Login method
     * 
    */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if ($token = auth()->attempt($credentials)) {
            return $this->responseWithToken($token, auth()->user());
        } else {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }
    }

    /** 
     * Logout method
     * 
    */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    /** 
     * Return JWT Token
     * 
    */
    protected function responseWithToken($token, $user)
    {
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }

}
