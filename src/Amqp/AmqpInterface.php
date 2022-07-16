<?php

namespace KyyTools\Amqp;

interface AmqpInterface {
    /**
     * 生产
     * @return mixed
     */
    public static function produce(...$args): bool;

    /**
     * 消费
     * @return mixed
     */
    public function consume(...$args): string;
}