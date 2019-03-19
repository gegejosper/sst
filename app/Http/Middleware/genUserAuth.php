<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class genUserAuth
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
        
        if(Auth::check()){
            if(Auth::user()->usertype == 'customer'){       
                return $next($request);
                //return redirect('/cart');
            }
            else {
                //return back();
                return redirect('/userregister');
            }
        }
        return redirect('/cart');
    }
}
