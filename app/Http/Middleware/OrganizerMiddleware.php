<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OrganizerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('organizer')->check()) {
            return $next($request);
        }

        return redirect()->route('organizer.login')->with('error', 'Please login to access this page.');
    }
}

