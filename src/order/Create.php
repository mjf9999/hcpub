<?php

namespace Morton\Hcpub\order;

use Morton\Hcpub\Base;

/**
 * 下单接口
 */
class Create extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/bmc/view/web/order/syncOrder';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        "bookInfoList" => [
            [
                "bookName" => "书名",
                "totalNumber" => 10,
                "finishSize" => "210*280",
                "indexNo" => 1,
                "bookFileList" => [
                    [
                        "partType" => "C",
                        "fileName" => "tangshuibook-11110-cover.pdf",
                        "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221114/3ec63ce8b98a3f21781933ee1b4a0420.docx"
                    ],
                    [
                        "partType" => "P",
                        "fileName" => "tangshuibook-11110-inner.pdf",
                        "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221114/3ec63ce8b98a3f21781933ee1b4a0420.docx"
                    ]
                ]
            ]
        ],
        "receiveInfos" => [
            "detailedAddress" => "fffff",
            "contactMan" => "ffaaaa",
            "contactMobile" => "18877772222",
            "province" => "北京市",
            "city" => "广州",
            "county" => "东城区",
            "streetAddress" => ""
        ],
        "callBackUrl" => "https=>//testapi.justcome.cn/prints/callback/hucai",
        "outOrderNo" => "6180aace9e3aa80028af3ae0"
    ];

    protected function validate()
    {
        // 对参数进行验证
    }
}
