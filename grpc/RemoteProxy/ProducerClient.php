<?php
// GENERATED CODE -- DO NOT EDIT!

namespace RemoteProxy;

/**
 */
class ProducerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \RemoteProxy\Params $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \RemoteProxy\Reply
     */
    public function push(\RemoteProxy\Params $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RemoteProxy.Producer/push',
        $argument,
        ['\RemoteProxy\Reply', 'decode'],
        $metadata, $options);
    }

}
