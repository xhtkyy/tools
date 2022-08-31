<?php
// GENERATED CODE -- DO NOT EDIT!

namespace MessagePlatform;

/**
 */
class AuthClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \MessagePlatform\TokenParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \MessagePlatform\Reply
     */
    public function getToken(\MessagePlatform\TokenParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MessagePlatform.Auth/getToken',
        $argument,
        ['\MessagePlatform\Reply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \MessagePlatform\TokenParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \MessagePlatform\Reply
     */
    public function checkToken(\MessagePlatform\TokenParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MessagePlatform.Auth/checkToken',
        $argument,
        ['\MessagePlatform\Reply', 'decode'],
        $metadata, $options);
    }

}
