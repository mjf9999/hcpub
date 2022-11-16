<?php

namespace Morton\Hcpub\update;

use Morton\Hcpub\Base;

/**
 * 修改订单文件
 */
class FileInfos extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/bmc/view/web/order/upladeFileInfos';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        "bookFileList" => [
            [
                "itemNo" => 1,
                "partType" => "C",
                "fileName" => "tangshuibook-11110-cover.pdf",
                "fileUrl" => "https://bookssl.tangshui.net/tangshuibook-11110-cover.pdf"
            ],
            [
                "itemNo" => 1,
                "partType" => "P",
                "fileName" => "tangshuibook-11110-inner.pdf",
                "fileUrl" => "https://bookssl.tangshui.net/tangshuibook-11110-inner.pdf"
            ]
        ],
        "outOrderNo" => "6180aace9e3aa80028af3ae0"
    ];

    protected function validate()
    {
        // 对参数进行验证
    }
}
