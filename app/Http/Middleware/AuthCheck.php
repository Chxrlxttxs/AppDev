<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('loginId')) {
            return redirect()->route('auth.index')->with('error', 'You must be logged in to access this page.');
        }

        // Prevent caching of protected pages
        return $next($request)->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires', '0');
    }
}