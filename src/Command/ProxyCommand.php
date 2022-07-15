<?php

namespace KyyTools\Command;

use Illuminate\Console\Command;
use Illuminate\Contracts\Support\Arrayable;

class ProxyCommand extends Command {
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
    protected $description = '方法调用代理';

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
        $class = $this->argument('class');
        if (!class_exists($class)) {
            $this->output->write("$class not found");
            return;
        }
        //反序列
        $args = unserialize(str_replace('#', '"', $this->option("args")));
        try {
            $res = (new $class)->{$this->argument("func")}($args);
            if ($res instanceof Arrayable) {
                $res = $res->toArray();
            }
            if (is_array($res)) {
                $res = json_encode($res, JSON_UNESCAPED_UNICODE);
            }
            $this->output->write($res);
        } catch (\Exception $exception) {
            $this->output->write($exception->getMessage());
        }
    }
}