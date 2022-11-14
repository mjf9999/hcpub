<?php

namespace Morton\Hcpub;

use Exception;

class Factory
{
    /**
     * @var array $config
     */
    protected static $config = [
        // 请求网关  http://api.hcpub.cn
        'gateway' => 'http://120.86.125.166:6060',
        // 开发者ID
        'appId' => 'zx_hmlh3ol8',
        // 开发者密码
        'appSecret' => 'f0c0f6d35fabdb49912ec760af197466d20da1b6',
        // 加密方式
        'method' => 'DES-CBC'
    ];

    public static function app($name)
    {
        $class = 'Morton\\Hcpub\\' . $name;
        if (class_exists($class)) {
            $objcet = new $class;
            $objcet->setConfig(self::$config);
            return $objcet;
        } else {
            throw new Exception("err:{$class}类不存在");
        }
    }
    
    public static function setConfig($config)
    {
        self::$config = $config;
    }
}
