<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App;

class Localization
{

    public $languages = ['en','ta'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->route('locale');
        if ($locale!=null && in_array($locale, $this->languages)) {
            App::setlocale($locale);
        }
        return $next($request);
    }
}
