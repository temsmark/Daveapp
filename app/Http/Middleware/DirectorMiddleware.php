<?php

namespace App\Http\Middleware;

use Closure;

class DirectorMiddleware
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
        if ($request ->User()->role_id==3){

            return $next($request);
    }}
}
