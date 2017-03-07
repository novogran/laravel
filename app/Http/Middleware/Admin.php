<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
  public function handle($request, Closure $next, $guard = null)
    {

		if(Auth::user()) {
			if(Auth::user()->isAdmin !=1){
				return redirect('/hhjkj');
			}
			else{
				return $next($request);
			}
       
		}
		else{
			return redirect('/');
		
		}
	}
}
