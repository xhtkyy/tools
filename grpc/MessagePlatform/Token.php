<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/.proto/message-platform.proto

namespace MessagePlatform;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>MessagePlatform.Token</code>
 */
class Token extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 role = 1;</code>
     */
    protected $role = 0;
    /**
     * Generated from protobuf field <code>int32 user_id = 2;</code>
     */
    protected $user_id = 0;
    /**
     * Generated from protobuf field <code>string token = 3;</code>
     */
    protected $token = '';
    /**
     * Generated from protobuf field <code>.MessagePlatform.TokenType token_type = 4;</code>
     */
    protected $token_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $role
     *     @type int $user_id
     *     @type string $token
     *     @type int $token_type
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grpc\Proto\MessagePlatform::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 role = 1;</code>
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Generated from protobuf field <code>int32 role = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setRole($var)
    {
        GPBUtil::checkInt32($var);
        $this->role = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 user_id = 2;</code>
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Generated from protobuf field <code>int32 user_id = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setUserId($var)
    {
        GPBUtil::checkInt32($var);
        $this->user_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string token = 3;</code>
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Generated from protobuf field <code>string token = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->token = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.MessagePlatform.TokenType token_type = 4;</code>
     * @return int
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * Generated from protobuf field <code>.MessagePlatform.TokenType token_type = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setTokenType($var)
    {
        GPBUtil::checkEnum($var, \MessagePlatform\TokenType::class);
        $this->token_type = $var;

        return $this;
    }

}
