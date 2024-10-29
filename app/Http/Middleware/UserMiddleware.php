<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated with the 'web' guard
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login'); // Redirect to the user login route
        }

        return $next($request);
    }
}
