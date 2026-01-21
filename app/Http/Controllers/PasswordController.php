<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    public function edit()
    {
            return view('profile.password');
    }

    public function update(Request $request)
    {
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required', 'confirmed', 'min:6'],
            ]);

            $user = Auth::user();

            // Check current password
            if (! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'Current password is incorrect.',
                ]);
            }

            // Update password
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            // Logout after password change (if logging out needed)
            // Auth::logout();

            // $request->session()->invalidate();
            // $request->session()->regenerateToken();

            return redirect('/profile')->with('success', 'Password changed successfully. Please login again.');
    }

}
