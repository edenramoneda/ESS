<?php

namespace App\Http\Middleware;

use Closure;
use ACL;
use Auth;

class Restriction
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
        if(!Auth::user()){
            return redirect()->route('empLog');
        }
        
        return $next($request);
    }
}
