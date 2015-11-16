<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $adminName)
    {
        if(auth()->check() && auth()->user()->username == $adminName) {
            return $next($request);
        }

        return redirect('/');
    }
}
