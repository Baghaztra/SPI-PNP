<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index()
    {
        return view("admin.signin");
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/siwas/dashboard')->with('success-login', 'Welcome Back!');
        } else {
            return redirect('login')->with('error', 'Email atau password salah.')->onlyInput('email');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success-logout', 'Anda telah logout.');
    }
}
