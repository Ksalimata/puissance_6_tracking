<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if(Auth::user()->role_id==2 || Auth::user()->role_id==3 ) 
        {
            return redirect()->back()->with('error',"Vous n'êtes pas autorisé à accéder à cet espace.");   
        }
        elseif (Auth::user()->role_id==4) {
            return redirect('carte');
        }
        
        
        else
            return $next($request);
    }
}
