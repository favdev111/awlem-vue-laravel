<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;

use Closure;

class AdminLanguage
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
        if(!$language){
            $request->session()->put('language', 1);
            $this->language = 1; 
            App::setLocale('ar');
        }
        else{
            $this->language = $request->session()->get('language');
            if($this->language == 1)
                App::setLocale('ar');
            else
                App::setLocale('en');    
        }

        view()->composer('admin.layout',function($view){
            $view->with('settings',['language'=>$this->language]);
        });
        return $next($request);
    }
}
