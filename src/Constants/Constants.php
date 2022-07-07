<?php

namespace KyyTools\Constants;

abstract class Constants {
    //缓存
    static $cache = [];

    /**
     * 转数组
     * @return mixed
     */
    public static function toArray() {

        $class = static::class;

        // 第一次获取，就通过反射来获取
        if (!isset(static::$cache[$class])) {
            $reflection            = new \ReflectionClass(static::class);
            static::$cache[$class] = $reflection->getConstants();
        }

        return static::$cache[$class];
    }

    /**
     * 通过key获取值
     * @param mixed $key
     * @return mixed
     */
    public static function value($key) {
        return static::toArray()[$key] ?? null;
    }

    /**
     * 通过值获取key
     * @param mixed $value
     * @return int|string|null
     */
    public static function key($value) {
        foreach (static::toArray() as $key => $item) {
            if ($item == $value) return $key;
        }
        return null;
    }
}
