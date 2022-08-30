<?php
// GENERATED CODE -- DO NOT EDIT!

namespace MessagePlatform;

/**
 * 模块服务
 */
class ModuleClient extends \Grpc\BaseStub {

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
     * @param \MessagePlatform\ModulePushParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \MessagePlatform\Reply
     */
    public function pushMessage(\MessagePlatform\ModulePushParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MessagePlatform.Module/pushMessage',
        $argument,
        ['\MessagePlatform\Reply', 'decode'],
        $metadata, $options);
    }

}
