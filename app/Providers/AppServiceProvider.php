<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use DB;
// use Event;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // DB::connection()->enableQueryLog();
        // Event::listen('kernel.handled',function($request,$response){
        //     if($request->has('query-log')){
        //         $query=DB::getQueryLog();
        //         dd($query);
        //     }
        // });
        //
    }
}
