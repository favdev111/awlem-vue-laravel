<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;

class FrontData
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
        $settingsData = Setting::first();
        $this->settingsData = $settingsData;
        view()->composer('frontEnd.front_layout', function ($view) {
            $view->with('settingData', ['settings' => $this->settingsData]);
        });
        $request->settingsData = $this->settingsData;
        return $next($request);
    }
}
