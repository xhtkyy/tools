<?php

namespace KyyTools\Command;

use Illuminate\Console\Command;
use Illuminate\Contracts\Support\Arrayable;
use KyyTools\Exceptions\Exception;
use KyyTools\Facades\Log;

class RemoteProxyCommand extends Command {
    /**
     * 命令名称及签名
     *
     * @var string
     */
    protected $signature = 'kyy:proxy {class : 指定类} {func : 指定方法} {--args= : 请求参数}';

    /**
     * 命令描述
     *
     * @var string
     */
    protected $description = '远程方法调用代理';

    /**
     * 创建命令
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * 执行命令
     */
    public function handle() {
        //设置执行时间限制
        set_time_limit(10);
        //获取参数
        $class = $this->argument('class');
        $func  = $this->argument("func");
        $args  = $this->option("args");

        try {
            if (!class_exists($class) || !method_exists($class, $func)) {
                throw new Exception("[class]$class [method]$func not found");
            }
            //检查是序列化结果
            if (strstr($args, "#") && strstr($args, "{")) {
                //反序列
                $args = unserialize(str_replace('#', '"', $args));
            }
            $message = (new $class)->{$this->argument("func")}($args);
            if ($message instanceof Arrayable) {
                $message = $message->toArray();
            }
            if (is_array($message)) {
                $message = json_encode($message, JSON_UNESCAPED_UNICODE);
            }
            //结果成功
            if (strtolower($message) == "success") {
                $this->output->write($message);
                return;
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }
        //记录错误日志
        Log::channel("remote-proxy")->error($message, compact("class", "func", "args"));
        //返回
        $this->output->write($message);
    }
}