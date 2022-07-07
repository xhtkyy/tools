<?php

namespace KyyTools\Provider;

use Illuminate\Support\ServiceProvider;
use KyyTools\Language\Translate;
use KyyTools\Logger\Logger;

class LoggerProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // 发布配置文件
        $path = realpath(__DIR__ . '/../../config/kyy_logger.php');
        $this->publishes([$path => config_path('kyy_logger.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(Translate::class, function ($app) {
            return new Logger(config("kyy_logger"));
        });
    }
}
