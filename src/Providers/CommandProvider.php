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
        if ($this->app->runningInConsole()) {
            $this->commands([
                ProxyCommand::class,
            ]);
        }
    }
}