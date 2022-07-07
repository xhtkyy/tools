<?php

namespace KyyTools\Provider;

use Illuminate\Support\ServiceProvider;
use KyyTools\Language\Translate;

class LangProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(Translate::class, function ($app) {
            return new Translate();
        });
    }
}
