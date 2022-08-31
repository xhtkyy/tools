<?php

namespace KyyTools\Facades;

use Illuminate\Support\Facades\Facade;
use KyyTools\MessagePlatform\Client;
use MessagePlatform\TokenParams;

/**
 * @method static mixed authGetToken(TokenParams $tokenParams)
 */
class MessagePlatformClient extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string {
        return Client::class;
    }
}