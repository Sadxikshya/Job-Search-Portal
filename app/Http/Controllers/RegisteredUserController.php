<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create ()
    {
        return view('auth.register');
    }

    // public function store ()
    // {
    //     $attributes = request()->validate([
    //         'first_name' => ['required', 'min:1'],
    //         'last_name' => ['required', 'min:1'],
    //         'email' => ['required', 'email','unique:users'], //duplicate user prevent garna lai unique users
    //         'password' => ['required', 'confirmed', Password::min(6)],
    //         'role_type' => 'required|string|in:employer,jobseeker', 
    //     ]);

    //     $attributes['password'] = bcrypt($attributes['password']);

    //     $user = User::create($attributes);

    //     // FIRE EVENT
    //     event(new UserRegistered($user));


    //     // Mail::to($user->email)->send(new WelcomeMail($user)); //very slow loading of ppage because of mail sending

    //     Auth::login($user);

    //     return redirect('/login');
    // }

    public function edit()
    {
        return view('auth.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $attributes = $request->validate([
            'first_name' => ['required', 'min:1'],
            'last_name' => ['required', 'min:1'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role_type' => 'required|string|in:employer,jobseeker',
        ]);

        $user->update($attributes);

        return redirect('/profile/edit')->with('success', 'Profile updated successfully!');
    }


}
