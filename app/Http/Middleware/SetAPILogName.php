<?php

namespace App\Http\Middleware;

use App\Services\ActivityLogService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SetAPILogName
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
        if (Config::get('activitylog.default_log_name') !== ActivityLogService::TYPE_API) {
            Config::set('activitylog.default_log_name', ActivityLogService::TYPE_API);
        }

        return $next($request);
    }
}
