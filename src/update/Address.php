<?php

namespace Morton\Hcpub\update;

use Morton\Hcpub\Base;

/**
 * 修改订单地址
 */
class Address extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/bmc/view/web/mallOrder/updateOrderAddress';
    /**
     * @var array $options 请求参数
     */
    protected $options = [
        "operationType" => 1,
        "reason" => "测试修改",
        "contact" => "张三",
        "contactPhone" => "13800000000",
        "address" => "广东省东莞市虎门镇虎门印艺股份有限公司",
        "orderNo" => "JY202106213655"
    ];

    protected function validate()
    {
        // 对参数进行验证
    }
}