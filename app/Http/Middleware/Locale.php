<?php

namespace itstep\Http\Middleware;

use Closure;
use App;
use Config;
use Session;
use Cookie;

class Locale
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
        $raw_locale = $request->cookie('lang');

        if (in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        }
        else $locale = Config::get('app.fallback_locale');

        App::setLocale($locale);

        $request->cookie('lang');

        return $next($request);
    }
}
