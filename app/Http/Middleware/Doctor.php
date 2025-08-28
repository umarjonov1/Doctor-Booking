<?php

namespace App\Http\Middleware;

use Closure;

class Doctor
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
        if (\Auth::user()->name == 'doctor') {
            return $next($request);
        }
        // if not doctor, return 403 or redirect
        return response()->json(['message' => 'Unauthorized as doctor'], 403);
    }
}
