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

            //archives and types should always be accessible in a view.
            $archives = \App\Festival::archives();

            //Only the types that correspond with a festival should be shown
            $types = \App\Type::has('festivals')->pluck('name');

            //link the archives and types to the view
            $view->with(compact('archives', 'types'));
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
