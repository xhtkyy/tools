<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Pusher;

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
     * @param \Pusher\MessageParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Pusher\Reply
     */
    public function push(\Pusher\MessageParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Pusher.Message/push',
        $argument,
        ['\Pusher\Reply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pusher\Params $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Pusher\Reply
     */
    public function getList(\Pusher\Params $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Pusher.Message/getList',
        $argument,
        ['\Pusher\Reply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pusher\ReadParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Pusher\Reply
     */
    public function read(\Pusher\ReadParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Pusher.Message/read',
        $argument,
        ['\Pusher\Reply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pusher\ReadParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Pusher\Reply
     */
    public function getUnReadCount(\Pusher\ReadParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Pusher.Message/getUnReadCount',
        $argument,
        ['\Pusher\Reply', 'decode'],
        $metadata, $options);
    }

}
