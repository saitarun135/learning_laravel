<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
        dump(auth('api')->user()->is_admin);
        return (auth('api')->user()->is_admin == 0) ? response()->json('Forbidden') : $next($request);
        return $next($request);
    }
}
