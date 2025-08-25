<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->status !== 1) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['Akaun anda tidak aktif. Sila hubungi khidmat sokongan pelanggan.']);
        }

        return $next($request);
    }
}
