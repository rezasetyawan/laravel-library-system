<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // redirect to forbidden page
            return redirect('login');
        } // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.

        $user = Auth::user();

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // redirect to forbidden page
        return redirect('login');
    }
}