<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogin
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
        if(empty(Auth::user()->username) || Auth::user()->level != 1){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
