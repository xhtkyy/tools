<?php

namespace KyyTools\MessagePlatform;

use KyyTools\Exceptions\Exception;
use MessagePlatform\AuthClient;
use MessagePlatform\Reply;
use MessagePlatform\TokenParams;

class Client {
    static private $client = [];

    /**
     * @return mixed
     */
    public function getClient($client = AuthClient::class) {
        if (!isset(self::$client[$client])) {
            self::$client[$client] = new $client(config('kyy_message_platform.hostname'), [
                'credentials' => null,
            ]);
        }
        return self::$client[$client];
    }

    /**
     * 获取令牌
     * @param TokenParams $tokenParams
     * @return mixed
     * @throws Exception
     */
    public function authGetToken(TokenParams $tokenParams) {
        /**
         * @var AuthClient $client
         */
        $client = $this->getClient();
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->getToken($tokenParams)->wait();
        if (!$reply || !$reply->getSuccess()) throw new Exception($reply->getMessage() ?? "获取令牌失败");
        return json_decode($reply->getMessage(), true);
    }
}