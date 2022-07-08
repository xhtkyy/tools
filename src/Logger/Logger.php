<?php

namespace KyyTools\Logger;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Psr\Log\LoggerInterface;

/**
 * @method void emergency(string $message, array $context = [])
 * @method void alert(string $message, array $context = [])
 * @method void critical(string $message, array $context = [])
 * @method void error(string $message, array $context = [])
 * @method void warning(string $message, array $context = [])
 * @method void notice(string $message, array $context = [])
 * @method void info(string $message, array $context = [])
 * @method void debug(string $message, array $context = [])
 */
class Logger {
    private static $channels = [];
    protected $config;

    public function __construct() {
        //先置空
        static::$channels = [];
        $this->config     = config("kyy_logger") ?? [];
    }

    public function channel(string $name = "app"): LoggerInterface {
        if (!isset(static::$channels[$name])) {
            //配置
            $handel = new RotatingFileHandler(
                storage_path(($this->config[$name]['path'] ?? (($this->config['path'] ?? "logs") . "/{$name}")) . "/{$name}.log"),
                $this->config[$name]['max_files'] ?? $this->config['max_files'] ?? 10,
                $this->config[$name]['level'] ?? $this->config['level'] ?? \Monolog\Logger::DEBUG
            );
            $handel->setFormatter(new JsonFormatter());
            static::$channels[$name] = new \Monolog\Logger($name, [$handel]);
        }
        return static::$channels[$name];
    }

    public function log(string $channel, string $level, string $message, array $context = []) {
        $this->channel($channel)->log($level, $message, $context);
    }

    public function exception($channel, \Throwable $exception, $level = 400) {
        $this->channel($channel)->log($level, $exception->getMessage(), [
            "code" => $exception->getCode(),
            "line" => $exception->getFile() . ": " . $exception->getLine()
        ]);
    }

    public function __call($name, $arguments) {
        if (in_array($name, ["log", "channel", "exception"])) {
            $this->$name(...$arguments);
        } else {
            $this->log("app", $name, ...$arguments);
        }
    }
}
