<?php

namespace KyyTools\Facades;

use Illuminate\Support\Facades\Facade;
use KyyTools\MessagePlatform\Client;
use MessagePlatform\MessageChannel;
use MessagePlatform\Role;
use MessagePlatform\TokenParams;
use MessagePlatform\Zone;

/**
 * @method static mixed authGetToken(TokenParams $tokenParams)
 * @method static mixed pushModuleMessage(string $module_key, array $acceptUsers, array $extra = [], int $role = Role::PURCHASER, int $channel = MessageChannel::NONE, int $zone = Zone::NONE)
 */
class MPClient extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string {
        return Client::class;
    }
}