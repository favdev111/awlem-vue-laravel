<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;

use Closure;

class FrontLanguage
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
        $language = $request->session()->get('language');
        $langType2 = '';
        $langType3 = '';

        if (!$language) {
            $request->session()->put('language', 1);
            $this->language = 1;
            App::setLocale('ar');
            $langType2 = 'ar';
            $langType3 = 'ara';
        } else {
            $this->language = $request->session()->get('language');
            if ($this->language == 1) {
                App::setLocale('ar');
                $langType2 = 'ar';
                $langType3 = 'ara';
            } else {
                App::setLocale('en');
                $langType2 = 'en';
                $langType3 = 'eng';
            }
        }
        $request->langType2 = $langType2;
        $request->langType3 = $langType3;
        $this->langType2 = $langType2;
        $this->langType3 = $langType3;
        view()->composer('frontEnd.front_layout', function ($view) {
            $view->with('settingsFront', ['language' => $this->language, 'langType2' => $this->langType2, 'langType3' => $this->langType3]);
        });
        return $next($request);
    }
}
