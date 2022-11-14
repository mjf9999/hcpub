<?php

namespace Morton\Hcpub;

use Morton\Hcpub\tools\DES;

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
        $encrypt = $des->encrypt(json_encode($data));
        $body = [
            'appId' => $this->config['appId'],
            'encryptedParam' => $encrypt,
        ];
        $params = [
            'json' => $body,
            'timeout' => 10
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $gateway, $params);
        $statusCode = $response->getStatusCode();
        if (200 != $statusCode) {
        }
        return $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

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
