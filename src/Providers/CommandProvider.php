<?php

namespace KyyTools\Providers;

use Illuminate\Support\ServiceProvider;
use KyyTools\Command\RemoteProxyCommand;

class CommandProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // 发布配置文件
        $path = realpath(__DIR__ . '/../../config/kyy_remote_proxy.php');
        $this->publishes([$path => config_path('kyy_remote_proxy.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RemoteProxyCommand::class, //远程代理类
            ]);
        }
    }
}