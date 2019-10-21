<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        
        // setlocale(LC_MONETARY, 'Portuguese_Brazil.1252'); <-- for windows
        setlocale(LC_MONETARY, 'pt_BR.UTF-8'); // <-- for linux
        return $next($request);
    }
}
