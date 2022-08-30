<?php

namespace KyyTools\Providers;

use Illuminate\Support\ServiceProvider;
use KyyTools\MessagePlatform\Client;

class MessagePlatformProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // 发布配置文件
        $path = realpath(__DIR__ . '/../../config/kyy_message_platform.php');
        $this->publishes([$path => config_path('kyy_message_platform.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(Client::class, function ($app) {
            return new Client();
        });
    }
}