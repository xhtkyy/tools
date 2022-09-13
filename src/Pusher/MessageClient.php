<?php

namespace KyyTools\Pusher;

use KyyTools\Exceptions\Exception;
use KyyTools\Grpc\GrpcClient;
use Pusher\Params;
use Pusher\ReadParams;
use Pusher\Reply;

class MessageClient {
    /**
     * @return \Pusher\MessageClient
     */
    private function getClient(): \Pusher\MessageClient {
        /**
         * @var \Pusher\MessageClient $res
         */
        $res = app(GrpcClient::class)->get(\Pusher\MessageClient::class, config("kyy_pusher.hostname"));
        return $res;
    }

    /**
     * 获取列表
     * @param string $app
     * @param string $channel
     * @param int $page
     * @param int $pageSize
     * @return mixed
     * @throws Exception
     */
    public function getList(string $app, string $channel, int $page = 1, int $pageSize = 10) {
        $param = new Params();
        $param->setApp($app)
            ->setChannel($channel)
            ->setPage($page)
            ->setPageSize($pageSize);
        $client = $this->getClient();
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->getList($param)->wait();
        if (!$reply) throw new Exception("获取失败", 1);
        if (!$reply->getSuccess()) throw new Exception("获取失败," . $reply->getMessage(), 1);
        return json_decode($reply->getMessage(), true);
    }

    /**
     * 获取未读数量
     * @param string $app
     * @param string $channel
     * @return mixed
     * @throws Exception
     */
    public function getUnReadCount(string $app, string $channel) {
        $param = new ReadParams();
        $param->setChannel($channel)->setApp($app);
        $client = $this->getClient();
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->getUnReadCount($param)->wait();
        if (!$reply) throw new Exception("获取失败", 1);
        if (!$reply->getSuccess()) throw new Exception("获取失败," . $reply->getMessage(), 1);
        return json_decode($reply->getMessage(), true);
    }

    /**
     * 标记已读
     * @param string $app
     * @param string $channel
     * @param string $ids
     * @return mixed
     * @throws Exception
     */
    public function read(string $app, string $channel, string $ids) {
        $param = new ReadParams();
        $param->setChannel($channel)->setApp($app)->setIds($ids);
        $client = $this->getClient();
        /**
         * @var Reply $reply
         */
        list($reply, $status) = $client->read($param)->wait();
        if (!$reply) throw new Exception("获取失败", 1);
        if (!$reply->getSuccess()) throw new Exception("获取失败," . $reply->getMessage(), 1);
        return json_decode($reply->getMessage(), true);
    }
}