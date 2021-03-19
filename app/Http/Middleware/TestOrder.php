<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        echo "I happen now \n";
        return $next($request);
    }
}
