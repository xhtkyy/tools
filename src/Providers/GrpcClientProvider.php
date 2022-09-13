<?php

namespace KyyTools\Providers;

use Illuminate\Support\ServiceProvider;
use KyyTools\Grpc\GrpcClient;
use KyyTools\MessagePlatform\Client;

class GrpcClientProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // 发布配置文件
        $path = realpath(__DIR__ . '/../../config/kyy_pusher.php');
        $this->publishes([$path => config_path('kyy_pusher.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(GrpcClient::class, function ($app) {
            return new GrpcClient();
        });
    }
}