<?php
return [
    "path"      => "logs", //存放日志文件夹
    "max_files" => 10, //按日期切割最多日志数
    "level"     => \Monolog\Logger::DEBUG, //日志等级 DEBUG < INFO < NOTICE < WARNING < ERROR ...
    //支持渠道自定义如
    "app"       => [
        "path"      => "logs/app", //存放渠道日志文件夹
        "max_files" => 10,
        "level"     => \Monolog\Logger::DEBUG,
    ],
];
