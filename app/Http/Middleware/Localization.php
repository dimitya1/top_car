<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Class Localization
 * @package App\Http\Middleware
 */
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!session('locale')) {
            $requestedLanguage = (string) Str::of($request->server('HTTP_ACCEPT_LANGUAGE'))
                ->substr(0, 2)
                ->lower();
        } else {
            $requestedLanguage = session('locale');
        }

        $language = config('topcar.locale_ru', 'ru');
        if (in_array($requestedLanguage, config('topcar.locales'))) {
            $language = $requestedLanguage;
        }

        app()->setLocale($language);

        return $next($request);
    }
}
