<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // role 1 = staff
        if (Auth::user()->role_id === 1) {
            return $next($request);
        }

        // role 1 = manager
        if (Auth::user()->role_id === 2) {
            return redirect()->route('manager');
        }

        // role 1 = admin
        if (Auth::user()->role_id === 3) {
            return redirect()->route('manager');
        }
    }
}
