<?php

namespace KyyTools\Amqp;

abstract class AmqpAbstract implements AmqpInterface {

    const SUCCESS = "success";

    public static function produce(...$args): bool {
        var_dump([base_path(), static::class, "consume", func_get_args()]);
        //推送消费
        return true;
    }

    public function consume(...$args): string {
        //默认响应成功
        return self::SUCCESS;
    }
}