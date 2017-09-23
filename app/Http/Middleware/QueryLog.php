<?php

namespace App\Http\Middleware;

use Closure;

class QueryLog
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
        if (\config('app.debug')) {
            \DB::connection()->enableQueryLog();
            $response = $next($request);
            \logger(\DB::getQueryLog());
            return $response;
        }
        
        return $next($request);
    }
}
