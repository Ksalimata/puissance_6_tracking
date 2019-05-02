<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DRHMiddleware
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
        
        if (Auth::user()->role_id==2 || Auth::user()->role_id==4) {

           return redirect()->back()->with('error',"Vous n'êtes pas autorisé à accéder à cet espace.");  
        }
        else
            return $next($request);
    }
}
