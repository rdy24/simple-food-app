<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('api')->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized JWT Must Be Provided'
            ], 401);
        }
        return $next($request);
    }
}
