<?php

namespace App\Http\Middleware;

use Closure;

class oicAuth
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
            if(Auth::user()->usertype == 'oic'){       
                return $next($request);
            }
            else {
                return back();
                //return redirect('/');
            }
        }
        return back();
    }
}
