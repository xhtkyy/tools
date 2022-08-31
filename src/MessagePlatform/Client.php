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
        //生成密钥
        $signData = [
            "zone"       => $tokenParams->getZone(),
            "user_id"    => $tokenParams->getUserId(),
            "role"       => $tokenParams->getRole(),
            "token_type" => $tokenParams->getTokenType(),
            "at"         => $tokenParams->getAt()
        ];
        ksort($signData);
        $tokenParams->setPlatformKey(config("kyy_message_platform.platform_key"));
        $tokenParams->setSign(hash_hmac("sha256", http_build_query($signData), config("kyy_message_platform.platform_secret")));
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->getToken($tokenParams)->wait();
        if (!$reply) throw new Exception("获取令牌失败");
        if (!$reply->getSuccess()) throw new Exception($reply->getMessage());
        return json_decode($reply->getMessage(), true);
    }
}