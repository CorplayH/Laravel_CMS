<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
        if ( ! \Auth::check () || auth ()->user ()->is_admin != 1 ) {
            return redirect ( '/' );
        }
        return $next( $request );
    }
}

