<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // If already logged in as admin, go straight to dashboard
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->user()->role === 'admin') {
                $request->session()->regenerate();

                return redirect()->route('admin.dashboard');
            }

            // Credentials correct but not an admin — log them back out
            Auth::guard('admin')->logout();
        }

        return back()->withErrors([
            'email' => 'Username or password is incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
