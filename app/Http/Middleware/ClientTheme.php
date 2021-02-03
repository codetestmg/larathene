<?php

namespace App\Http\Middleware;

use App\Models\ThemeSetting;
use Closure;
use Illuminate\Http\Request;
use Shipu\Themevel\Facades\Theme;

class ClientTheme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $activeTheme=ThemeSetting::where('is_active',1)->first();
        Theme::set($activeTheme->theme_name);
        return $next($request);
    }
}
