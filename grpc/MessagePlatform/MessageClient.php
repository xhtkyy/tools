<?php
// GENERATED CODE -- DO NOT EDIT!

namespace MessagePlatform;

/**
 * 消息服务
 */
class MessageClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * 推送消息
     * @param \MessagePlatform\MessageParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \MessagePlatform\Reply
     */
    public function push(\MessagePlatform\MessageParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MessagePlatform.Message/push',
        $argument,
        ['\MessagePlatform\Reply', 'decode'],
        $metadata, $options);
    }

}
