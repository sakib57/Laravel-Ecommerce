<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // For Category-------------------------------------
        view()->composer('layout', function ($view) {
            $data = \DB::table('tbl_category')
                    ->where('publication_status',1)->get();
            $view->with('all_category',$data);
        });

        // For Brand-------------------------------------
        view()->composer('layout', function ($view) {
            $data = \DB::table('tbl_brand')
                    ->where('publication_status',1)->get();
            $view->with('all_brand',$data);
        });

        // For Slider-------------------------------------
        view()->composer('layout', function ($view) {
            $data = \DB::table('tbl_slider')
                    ->where('publication_status',1)->get();
            $view->with('all_slider',$data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
