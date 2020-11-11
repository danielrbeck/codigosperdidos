<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;

class PrimeiroMiddleware
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
        Log::debug('Passou pelo primeiro Middleware');

        //return response('isso para a cadeia de chamada de middlewares e views');
        return $next($request);
    }
}
