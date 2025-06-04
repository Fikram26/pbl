<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Login;
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
        if (!session()->has('login_id')) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $user = Login::find(session('login_id'));
        
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('login')->with('error', 'You must be an admin to access this page.');
        }

        return $next($request);
    }
} 