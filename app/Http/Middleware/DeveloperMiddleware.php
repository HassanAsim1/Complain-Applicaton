<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeveloperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the "admin" role
        if (auth()->check() && auth()->user()->role === 'developer') {
            return $next($request); // User has admin role, allow access
        }

        // User is not an admin, redirect to a different route (e.g., login)
        return redirect()->route('login');
    }
}
