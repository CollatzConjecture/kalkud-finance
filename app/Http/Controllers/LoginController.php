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
        if (auth()->check()) {
            return redirect('/home');
        }
    
        return view('auth.login');
    }    

    /** 
     * Login method
     * 
    */
    public function login(LoginRequest $request)
    {
        
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

}
