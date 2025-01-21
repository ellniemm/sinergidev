<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get raw cookie karena cookie diatur menggunakan javascript jadi tidak bisa diakses menggunakan $request->cookie('authToken')
        $token = $_COOKIE['authToken'] ?? null;
        
        Log::info('Token Debug:', [
            'raw_cookie' => $_COOKIE,
            'token' => $token,
            'request_cookies' => $request->cookies->all()
        ]);

        if (!$token) {
            Log::warning('Token not found in cookies');
            return redirect()->route('login')->with('error', 'Please login first to access this page.');
        }

        $request->attributes->set('authToken', $token);
        return $next($request);
    }
}
