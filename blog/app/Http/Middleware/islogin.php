<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;



class islogin
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
        if (Session::has('user')) {
            return $next($request);
        } else {
            return Redirect::to('/logIn')->with('message', 'Please Login!');
        }
        
    }
}
