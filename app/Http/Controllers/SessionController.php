<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() 
    {
       return view('auth.login');
    }

    // public function store() 
    // {
    //     $attributes = request()->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]); 

    //     if (!Auth::attempt($attributes)){
    //         throw ValidationException::withMessages([
    //             'email'=> 'Sorry the creds do not match opps!!'
    //         ]);
    //     };

    //     //regenrating the sesssion token

    //     request()->session()->regenerate();

    //     return redirect('/jobs');
    // }

    public function destroy(Request $request) 
    {
        $user=Auth::user();

        if ($user){
            $user->tokens()->delete(); //deleting all tokens for this user
        }
        // Logout from web session
        Auth::logout();
        
        // Invalidate session
        $request->session()->invalidate();
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
