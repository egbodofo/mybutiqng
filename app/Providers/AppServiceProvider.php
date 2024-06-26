<?php

namespace FleetCart\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Jackiedo\DotenvEditor\DotenvEditorServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     Schema::defaultStringLength(191);
    //     Paginator::useBootstrap();

    //     if (Request::secure()) {
    //         URL::forceScheme('https');
    //     }
    // }

    public function boot(UrlGenerator $url)
    {
        if (env('APP_ENV') == 'production') {
            $url->forceScheme('https');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if (! config('app.installed')) {
            $this->app->register(DotenvEditorServiceProvider::class);
        }
    }
}
