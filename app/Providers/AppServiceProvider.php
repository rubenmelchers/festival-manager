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
        view()->composer('layouts.sidebar', function($view) {

            $archives = \App\Festival::archives();

            $types = \App\Type::has('festivals')->pluck('name');

            $view->with(compact('archives', 'types'));

            // $view->with('archives', \App\Festival::archives());
            //
            // $view->with('types', \App\Type::has('festivals')->pluck('name'));
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
