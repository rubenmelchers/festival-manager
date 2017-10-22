<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
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

        //check if the user is logged in and if the user is an admin
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            //if so, continue
            return $next($request);
        }

        //if not, redirect to the home screen
        return redirect()->home();
    }
}
