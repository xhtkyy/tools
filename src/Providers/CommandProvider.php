<?php

namespace KyyTools\Providers;

use Illuminate\Support\ServiceProvider;
use KyyTools\Command\ProxyCommand;

class CommandProvider extends ServiceProvider {
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
        $this->app->singleton('command.kyy.proxy', function () {
            return new ProxyCommand();
        });
    }
}