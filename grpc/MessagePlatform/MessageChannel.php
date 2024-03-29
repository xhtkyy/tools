<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/.proto/message-platform.proto

namespace MessagePlatform;

use UnexpectedValueException;

/**
 * Protobuf type <code>MessagePlatform.MessageChannel</code>
 */
class MessageChannel
{
    /**
     * Generated from protobuf enum <code>NONE = 0;</code>
     */
    const NONE = 0;
    /**
     * Generated from protobuf enum <code>PUSHER = 1;</code>
     */
    const PUSHER = 1;
    /**
     * Generated from protobuf enum <code>IM = 2;</code>
     */
    const IM = 2;
    /**
     * Generated from protobuf enum <code>APP_PUSH = 3;</code>
     */
    const APP_PUSH = 3;
    /**
     * Generated from protobuf enum <code>EMAIL = 4;</code>
     */
    const EMAIL = 4;

    private static $valueToName = [
        self::NONE => 'NONE',
        self::PUSHER => 'PUSHER',
        self::IM => 'IM',
        self::APP_PUSH => 'APP_PUSH',
        self::EMAIL => 'EMAIL',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

