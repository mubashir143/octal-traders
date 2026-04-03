<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Not logged in → redirect to admin login
        if (! Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // Logged in but not an admin → redirect to admin login with error
        if (Auth::guard('admin')->user()->role !== 'admin') {
            Auth::guard('admin')->logout();

            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Username or password is incorrect.']);
        }

        return $next($request);
    }
}
