<?php

namespace App\Http\Middleware;

use Closure;

class preventBackHistory
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
        $response=$next($request);

        return $response->header('cache-control','nocache,no-store,max-age=0,must-revalidate')
        ->header('pragma','no-cache')->header('Expires','Sun, 02 Jan 1999 00:00:00 GMT ');


    }
}
