<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        Log::debug('Login attempt', [
            'email' => $request->email,
            'role' => $request->login_as,
            'ip' => $request->ip()
        ]);

        $user = User::where('email', $request->email)
                  ->where('role', $request->login_as)
                  ->first();

        if (!$user) {
            Log::warning('User not found', ['email' => $request->email]);
            return back()->withErrors([
                'email' => 'Invalid credentials or role mismatch',
            ])->onlyInput('email');
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::warning('Password mismatch', ['user_id' => $user->id]);
            return back()->withErrors([
                'email' => 'Invalid credentials or role mismatch',
            ])->onlyInput('email');
        }

        Auth::login($user, $request->remember);
        $request->session()->regenerate();

        Log::info('User logged in', ['user_id' => $user->id]);

        return redirect()->intended('/')->with('success', 'Login successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}