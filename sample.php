<?php
include_once 'vendor/autoload.php';

use Morton\Hcpub\Factory;

$config = [
    // 请求网关  http://api.hcpub.cn
    'gateway' => 'http://120.86.125.166:6060',
    // 开发者ID
    'appId' => 'zx_hmlh3ol8',
    // 开发者密码
    'appSecret' => 'f0c0f6d35fabdb49912ec760af197466d20da1b6',
    // 加密方式
    'method' => 'DES-CBC'
];
Factory::setConfig($config);
// 下单接口
$app = Factory::app('order\\Create');
echo $app->setBody([])->send().PHP_EOL;
// 修改订单地址
$app = Factory::app('update\\Address');
echo $app->setBody([])->send().PHP_EOL;
// 修改订单文件
$app = Factory::app('update\\FileInfos');
echo $app->setBody([])->send().PHP_EOL;