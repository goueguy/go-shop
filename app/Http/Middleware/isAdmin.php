<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
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

        //dd(Auth::user()->role->name);
        if(Auth::check()){

            if((Auth::user()->role->name==="Super Admin") || Auth::user()->role->name==="Admin"){
                return $next($request);
            }else{
                return redirect('home')->with('access-message','VOUS N AVEZ PAS LE DROIT D ACCÉDER A CETTE PAGE !!!');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
