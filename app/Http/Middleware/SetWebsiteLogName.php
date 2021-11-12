<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class SetWebsiteLogName
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Config::get('activitylog.default_log_name') !== 'website') {
            Config::set('activitylog.default_log_name', 'website');
        }

        return $next($request);
    }
}
