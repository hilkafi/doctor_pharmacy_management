<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Region;
use App\District;
use App\Area;
use App\Market;

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
        //

        view()->composer('layouts.app',function($view){

          $regions = Region::where('is_deleted',0)->get();
          $areas = District::where('is_deleted',0)->get();
          $teritorys = Area::where('is_deleted',0)->get();
          $markets = Market::where('is_deleted',0)->get();

            $view->with(compact('regions', 'areas', 'teritorys', 'markets'));


        });
    }
}
