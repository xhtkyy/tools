<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/.proto/message-platform.proto

namespace MessagePlatform;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>MessagePlatform.AcceptUser</code>
 */
class AcceptUser extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 role = 1;</code>
     */
    protected $role = 0;
    /**
     * Generated from protobuf field <code>repeated int32 ids = 2;</code>
     */
    private $ids;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $role
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $ids
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
     * Generated from protobuf field <code>repeated int32 ids = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * Generated from protobuf field <code>repeated int32 ids = 2;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->ids = $arr;

        return $this;
    }

}

