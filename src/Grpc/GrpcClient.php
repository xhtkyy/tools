<?php

namespace KyyTools\Grpc;

use MessagePlatform\AuthClient;

class GrpcClient {
    static private $client = [];

    /**
     * @return mixed
     */
    public function get($client = AuthClient::class, $hostname = '') {
        if (!isset(self::$client[$client])) {
            self::$client[$client] = new $client($hostname, [
                'credentials' => null,
            ]);
        }
        return self::$client[$client];
    }
}