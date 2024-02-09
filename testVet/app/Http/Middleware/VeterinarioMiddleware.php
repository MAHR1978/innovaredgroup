<?php

namespace App\Http\Middleware;

use Closure;

class VeterinarioMiddleware
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
        if(\Auth::user()->role != 'medico'){
            return redirect()->back();
        }
        return $next($request);
    }
}