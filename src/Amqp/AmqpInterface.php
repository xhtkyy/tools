<?php

namespace KyyTools\Amqp;

interface AmqpInterface {
    /**
     * 生产
     * @return mixed
     */
    public function produce(): bool;

    /**
     * 消费
     * @param $data
     * @return mixed
     */
    public function consume($data): string;
}