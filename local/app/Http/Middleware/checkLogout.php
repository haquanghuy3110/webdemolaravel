<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class checkLogout
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
        if(!Session::has('login')){
            return redirect()->intended('login');
        }
        return $next($request);
    }
}
