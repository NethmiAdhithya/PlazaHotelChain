<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'login_as' => 'required|in:manager,reservation_clerk,customer,travel_company',
        ]);

        // Find user by email and role (not using login_as as column)
        $user = User::where('email', $request->email)
                  ->where('role', $request->login_as)
                  ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->remember);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials or role mismatch',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}