<?php

namespace Morton\Hcpub;

use Morton\Hcpub\tools\DES;
use Morton\Hcpub\tools\Http;
use Exception;

class Base
{
    /**
     * @var array $config 网关
     */
    protected $config = [];

    /**
     * @var string 接口地址
     */
    protected $api;

    /**
     * @var array $body 请求参数
     */
    protected $body;

    public function __construct()
    {
    }

    public function send()
    {
        $data = $this->body;
        $this->validate();
        $appSecret = $this->config['appSecret'];
        $method =  $this->config['method'];
        $gateway = $this->config['gateway'] . $this->api;
        $key = substr($appSecret, 0, 8);
        $des = new DES($key, $method, DES::OUTPUT_BASE64, $key);
        $data = is_string($data) ? $data : json_encode($data, JSON_UNESCAPED_SLASHES);
        if ('cli' == php_sapi_name()) {
            echo 'gateway:' . $gateway . PHP_EOL;
            echo 'request:' . $data . PHP_EOL;
        }
        $encrypt = $des->encrypt($data);
        $body = [
            'appId' => $this->config['appId'],
            'encryptedParam' => $encrypt,
        ];
        try {
            $headers = ['Content-type: application/json'];
            $options = [
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_TIMEOUT => 60,
            ];
            $response = Http::post($gateway, json_encode($body, JSON_UNESCAPED_SLASHES), $options);
            return $response;
        } catch (Exception $e) {
            return json_encode(['code' => -1, 'message' => $e->getMessage(), 'result' => null]);
        }
    }
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }
    public function setBody($value)
    {
        $this->body = $value;
        return $this;
    }

    protected function validate()
    {
    }
}
