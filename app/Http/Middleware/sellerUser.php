<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class sellerUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check() && $request->user()->role == "seller") {
            return $next($request);
        } else {
                abort(403);
        }
        
    }
}
