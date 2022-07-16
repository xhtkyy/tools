<?php

namespace KyyTools\Amqp;

abstract class AmqpAbstract implements AmqpInterface {

    const SUCCESS = "success";

    public static function produce(...$args): bool {
        //只做校验参数
        $temp = new static(...$args);
        unset($temp);
        dd([base_path(), "\\\\" . str_replace("\\", "\\\\", static::class), "consume", str_replace("\"", "#", serialize(func_get_args()))]);
        //推送消费
        return true;
    }

    public function consume(): string {
        //默认响应成功
        return self::SUCCESS;
    }
}