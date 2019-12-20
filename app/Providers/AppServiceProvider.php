<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Region;
use App\District;
use App\Area;
use App\Market;
use App\PersonalInfo;

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

          $regions = Region::where('is_deleted',0)->orderBy('id', 'ASC')->get();
          $areas = District::where('is_deleted',0)->get();
          $teritories = Area::where('is_deleted',0)->get();
          $markets = Market::where('is_deleted',0)->get();

          //birthday notification count
            $date = date('m-d');
            $birthday = PersonalInfo::where('b_date', $date)->get();
            $anniversary = PersonalInfo::where('m_date', $date)->get();
            $number = count($birthday) + count($anniversary);

            $view->with(compact('regions', 'areas', 'teritories', 'markets', 'number'));


        });
    }
}
