## 对接虎彩的订单接口
 [API文档](./docs/api.md)
## 安装
```bash
composer require morton/hcpub
```

* 本地开发测试
```bash
# 安装
composer install
# 执行例子
php sample.php
```
```php
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
$app->setBody([])->send();
// 修改订单地址
$app = Factory::app('update\\Address');
$app->setBody([])->send();
// 修改订单文件
$app = Factory::app('update\\FileInfos');
$app->setBody([])->send();
```