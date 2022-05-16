<?php

namespace App\Http\Middleware;

use Closure;

class Profile {
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
