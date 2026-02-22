<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // ... validation code ...

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        // Updated authentication
        Auth::login($user); // Changed from auth()->login($user)

        return redirect('/')->with('success', 'Registration successful!');
    }
}