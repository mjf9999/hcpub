
## DES支持的加密方式
* ECB DES-ECB、DES-EDE3
* CBC DES-CBC、DES-EDE3-CBC、DESX-CBC
* CFB DES-CFB8、DES-EDE3-CFB8
* CTR
* OFB

## 加密例子
```php
use Morton\Hcpub\DES\tools;

$data = (object)[];

$appSecret = 'f0c0f6d35fabdb49912ec760af197466d20da1b6';
$key = substr($appSecret, 0, 8);
$method = 'DES-CBC';
// 输出BASE64字串
$des = new DES($key, $method, DES::OUTPUT_BASE64, $key);

// 加密
$encrypt = $des->encrypt(json_encode($data));
echo $encrypt . PHP_EOL;

// 解密
$descrypt = $des->decrypt($encrypt);
print_r(json_decode($descrypt));
```