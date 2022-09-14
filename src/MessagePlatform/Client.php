<?php

namespace KyyTools\MessagePlatform;

use KyyTools\Exceptions\Exception;
use KyyTools\Grpc\GrpcClient;
use MessagePlatform\AcceptUser;
use MessagePlatform\AuthClient;
use MessagePlatform\MessageChannel;
use MessagePlatform\ModuleClient;
use MessagePlatform\ModulePushParams;
use MessagePlatform\Reply;
use MessagePlatform\Role;
use MessagePlatform\TokenParams;

class Client {
    /**
     * 获取令牌
     * @param TokenParams $tokenParams
     * @return mixed
     * @throws Exception
     */
    public function authGetToken(TokenParams $tokenParams) {
        /**
         * @var AuthClient $client
         */
        $client = app(GrpcClient::class)->get(AuthClient::class, config('kyy_message_platform.hostname'));
        //生成密钥
        $at           = $tokenParams->getAt();
        $platform_key = config("kyy_message_platform.platform_key");
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->getToken($tokenParams, [
            "at"             => ["{$at}"],
            "platform_key"   => [$platform_key],
            "platform_token" => [
                hash_hmac("sha256", http_build_query(compact("platform_key", "at")), config("kyy_message_platform.platform_secret"))
            ]
        ])->wait();
        if (!$reply) throw new Exception("获取令牌失败");
        if (!$reply->getSuccess()) throw new Exception($reply->getMessage());
        return json_decode($reply->getMessage(), true);
    }

    /**
     * 推送模块消息
     * @param string $module_key
     * @param array $acceptUsers
     * @param array $extra
     * @param int $role
     * @return mixed
     * @throws Exception
     */
    public function pushModuleMessage(string $module_key, array $acceptUsers, array $extra = [], int $role = Role::PURCHASER, int $channel = MessageChannel::NONE) {
        /**
         * @var ModuleClient $client
         */
        $client = app(GrpcClient::class)->get(ModuleClient::class, config('kyy_message_platform.hostname'));
        //参数
        if (!(current($acceptUsers) instanceof AcceptUser)) {
            $acceptUsers = [
                (new AcceptUser)->setRole($role)->setIds($acceptUsers)
            ];
        }
        $params = new ModulePushParams();
        $params->setModuleKey($module_key)
            ->setAcceptUsers($acceptUsers)
            ->setChannelId($channel)
            ->setExtra(json_encode($extra));
        //生成密钥
        $at           = time();
        $platform_key = config("kyy_message_platform.platform_key");
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->pushMessage($params, [
            "at"             => ["{$at}"],
            "platform_key"   => [$platform_key],
            "platform_token" => [
                hash_hmac("sha256", http_build_query(compact("platform_key", "at")), config("kyy_message_platform.platform_secret"))
            ]
        ])->wait();
        if (!$reply) throw new Exception("获取令牌失败");
        if (!$reply->getSuccess()) throw new Exception($reply->getMessage());
        return json_decode($reply->getMessage(), true);
    }
}