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
                "bindingTypeCode" => 1,
                "indexNo" => 1,
                "bookFileList" => [
                    [
                        "partType" => "C",
                        "fileName" => "tangshuibook-11110-cover.pdf",
                        "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221116/5badd0fa04cca88f098aa003ad4ce177.pdf",
                        "colorCode" => 2,
                        "materialCode" => 1
                    ],
                    [
                        "partType" => "P",
                        "fileName" => "tangshuibook-11110-inner.pdf",
                        "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221117/643791013547b4209fb7bc33207bdf8b.pdf",
                        "colorCode" => 1,
                        "materialCode" => 1
                    ]
                ]
            ],
            [
                "bookName" => "书名",
                "totalNumber" => 10,
                "finishSize" => "210*280",
                "bindingTypeCode" => 1,
                "indexNo" =>4,
                "bookFileList" => [
                    [
                        "partType" => "C",
                        "fileName" => "tangshuibook-11110-cover.pdf",
                        "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221116/5badd0fa04cca88f098aa003ad4ce177.pdf"
                    ],
                    [
                        "partType" => "P",
                        "fileName" => "tangshuibook-11110-inner.pdf",
                        "fileUrl" => "https://oss-fs.bbys.cn/mall/upload/20221117/643791013547b4209fb7bc33207bdf8b.pdf"
                    ]
                ]
            ]
        ],
        "receiveInfos" => [
            "detailedAddress" => "北京市北京东城区平湖街道地址520号",
            "contactMan" => "默默",
            "contactMobile" => "18877772222",
            "province" => "北京市",
            "city" => "北京市",
            "county" => "东城区",
            "streetAddress" => ""
        ],
        "callBackUrl" => "https://mall.bbys.cn/api/index/callback",
        "outOrderNo" => "12345677814"
    ];

    protected function validate()
    {
        // 对参数进行验证
    }
}
