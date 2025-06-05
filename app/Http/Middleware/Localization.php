<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('locale', config('app.locale')); // Default to app.locale
        if (in_array($locale, ['ar', 'en', 'fr'])) {
            App::setLocale($locale);
        }
        return $next($request);
    }
}