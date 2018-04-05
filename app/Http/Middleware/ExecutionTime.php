<?php

namespace App\Http\Middleware;

use Closure;

class ExecutionTime
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('X-Elapsed-Time', microtime(true) - LUMENL_START);

        return $response;
    }
}