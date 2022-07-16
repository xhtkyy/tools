<?php

namespace KyyTools\Amqp;

abstract class AmqpAbstract implements AmqpInterface {

    const SUCCESS = "success";

    public function produce(): bool {
        var_dump([static::class, "consume"]);
        //推送消费
        return true;
    }

    public function consume($data): string {
        //默认响应成功
        return self::SUCCESS;
    }
}