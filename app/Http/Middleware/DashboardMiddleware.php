<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class DashboardMiddleware
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
        if(isset(Auth::user()->id))
        {
            if(Auth::user()->role_id==4 ) 
            {
                return redirect('carte');   
            }
            else
                return $next($request);   
        }
        else
            return redirect('login');
        
    }
}
