<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->name == 'admin') {
            return $next($request);
        }
        // if not admin, return 403 or redirect
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
