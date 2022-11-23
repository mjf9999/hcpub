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
                "fileName" => "cover.pdf",
                "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221116/5badd0fa04cca88f098aa003ad4ce177.pdf"
            ],
            [
                "itemNo" => 1,
                "partType" => "P",
                "fileName" => "test.pdf",
                "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221121/e4cec8643aae08ee3b4b681d68d9d2ee.pdf"
            ]
        ],
        "outOrderNo" => "12345677890"
    ];

    protected function validate()
    {
        // 对参数进行验证
    }
}
