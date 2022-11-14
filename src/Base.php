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
     * @var array $options 请求参数
     */
    protected $options;

    public function __construct()
    {
    }

    public function send()
    {
        $data = $this->options;
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
    public function setOptions($value)
    {
        $this->options = $value;
        return $this;
    }

    protected function validate()
    {
    }
}
