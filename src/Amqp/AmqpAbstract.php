<?php

namespace KyyTools\Amqp;

abstract class AmqpAbstract implements AmqpInterface {

    const SUCCESS = "success";

    public static function produce(...$args): bool {
        dd([base_path(), "\\\\" . str_replace("\\", "\\\\", static::class), "consume", str_replace("\"", "#", serialize(func_get_args()))]);
        //推送消费
        return true;
    }

    public function consume(...$args): string {
        //默认响应成功
        return self::SUCCESS;
    }
}