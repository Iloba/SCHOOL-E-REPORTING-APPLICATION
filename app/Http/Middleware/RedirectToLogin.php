<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    //   
        
        
        return $next($request);
    }

    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return view('bandit');
    //     }
    // }

}
