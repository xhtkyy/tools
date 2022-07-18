<?php

namespace KyyTools\Amqp;

use KyyTools\Facades\Log;
use KyyTools\Logger\Logger;
use RemoteProxy\Params;
use RemoteProxy\ProducerClient;
use RemoteProxy\Reply;

abstract class AmqpAbstract implements AmqpInterface {

    const SUCCESS = "success";
    protected $delay = 0; //毫秒 如：3000

    public static function produce(...$args): bool {
        if (!function_exists("base_path") || !function_exists("config")) {
            return false;
        }
        //只做校验参数
        $class = new static(...func_get_args());
        //推送消费
        $params = new Params();
        $params->setPath(base_path());
        $params->setClass("\\" . static::class);
        $params->setFunc("consume");
        $params->setArgs(str_replace("\"", "#", serialize(func_get_args()))); //设置参数
        $params->setDelay($class->delay);
        $params->setHostname(config("kyy_remote_proxy.proxy_host"));
        $client = new ProducerClient(config("kyy_remote_proxy.amqp_host"), [
            'credentials' => null,
        ]);
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->push($params)->wait();
        if ($reply != null && $reply->getSuccess()) {
            return true;
        }
        Log::channel("amqp-produce")->error($reply ? $reply->getMessage() : "请求失败", ['data' => $params->serializeToJsonString()]);
        return false;
    }

    public function consume(): string {
        //默认响应成功
        return self::SUCCESS;
    }
}