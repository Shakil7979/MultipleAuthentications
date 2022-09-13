<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
     
    public function handle(Request $request, Closure $next, $userType) 
    {
        if($userType === 'user'){
            if(auth()->user()->type == 0){ 
                return $next($request); 
            } 
        }elseif($userType === 'super-admin'){
            if(auth()->user()->type == 1){ 
                return $next($request); 
            } 
        }elseif($userType === 'manager'){
            if(auth()->user()->type == 2){ 
                return $next($request); 
            } 
        }
            return response()->json(['You do not have permission to access for this page.']);  

        
        /* return response()->view('errors.check-permission'); */

    }
}
