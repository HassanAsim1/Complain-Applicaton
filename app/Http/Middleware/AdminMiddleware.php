<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the "admin" role
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->role === 'admin') {
                // User has the "admin" role, allow access
                return $next($request);
            } elseif ($user->role === 'developer') {
                // User has the "developer" role, redirect to the 'developer.complaints' route
                return redirect()->route('developer.complaints');
            }
            // User doesn't have "admin" or "developer" role, redirect to 'client.complaints'
            return redirect()->route('client.complaints');
        }

        // User is not an admin, redirect to a different route (e.g., login)
        return redirect()->route('login');
    }
}
