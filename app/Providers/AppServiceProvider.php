<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master', function($view){
            $view->with('projects2', Project::orderBy('completion_date','DESC')->take(5)->get());
        });

         view()->composer('pages.frontpage', function($view){
            $view->with('projects2', Project::orderBy('completion_date','DESC')->take(5)->get());
        });

          view()->composer('errors.404', function($view){
            $view->with('projects2', Project::orderBy('completion_date','DESC')->take(5)->get());
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
