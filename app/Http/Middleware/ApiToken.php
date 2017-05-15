<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ApiToken
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
//        token_2t70aWnMd2QQqmxGwX20rGEZ2BXvbQEOEitJQiNAio8JHxlUgHSkjM

//        if (Auth::guard('api')->user()) {
            return $next($request);
//        }

//        return response()->json([
//            'status' => '401',
//            'error' => 'Unauthenticated.',
//        ], 401);
    }
}
