<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        
        return view('auth.login'); 
    }

    public function handleLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('home'); 
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect()->route('login'); 
    }
}
