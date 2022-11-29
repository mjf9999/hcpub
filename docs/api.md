# 创建订单

请求地址  
| 环境 | http地址 |  
| —————— | —————— |  
| 测试环境 | http://120.86.125.166:6060/bmc/view/web/order/syncOrder |  
| 正式环境 | http://api.hcpub.cn/bmc/view/web/order/syncOrder |

请求方式 `POST`

consumes `["application/json"]`

produces `["*/*"]`

接口描述

同步订单至虎彩闪印

#### schema属性说明

**订单提交实体**

| 参数名称           | 说明     | 请求类型 | 是否必须 | 类型     | schema |
| -------------- | ------ | ---- | ---- | ------ | ------ |
| appId          | 机构唯一标识 | body | true | string | 机构唯一标识 |
| encryptedParam | 参数加密信息 | body | true | string | 参数加密信息 |

**订单加密参数实体**

| 参数名称         | 说明    | 参数类型 | 是否必须 | 类型           | schema       |
| ------------ | ----- | ---- | ---- | ------------ | ------------ |
| bookInfoList | 书目信息  | body | true | bookInfoList |              |
| receiveInfos | 收件人信息 | body | true | receiveInfos |              |
| outOrderNo   | 外部订单号 | body | true | string       | 外部系统唯一订单号    |
| callBackUrl  | 回调地址  | body | true | string       | 外部系统订单状态回调接口 |

**书目信息参数实体(bookInfoList)**

| 参数名称            | 说明        | 参数类型 | 是否必须 | 类型     | schema                     |
| --------------- | --------- | ---- | ---- | ------ | -------------------------- |
| bookName        | 书名        | body | true | string | 失落的百年圣经                    |
| totalNumber     | 购买数量/印刷数量 | body | true | int    | 10                         |
| finishSize      | 成品尺寸      | body | true | string | 210*297                    |
| bindingTypeCode | 装订方式      | body | true | int    | 1 无线胶装 2 方脊精装 3 圆脊精装 4 骑马钉 |
| indexNo         | 订单行       | body | true | int    | 标识书目对应的订单行                 |

**书目文件信息参数试题(bookFileList)**

| 参数名称         | 说明        | 请求类型 | 是否必须  | 类型     | schema                |
| ------------ | --------- | ---- | ----- | ------ | --------------------- |
| partType     | 部件类型(C/P) | body | true  | string | C封面、P内页               |
| fileName     | 文件名称      | body | false | string | 文件名称                  |
| fileUrl      | 文件下载地址    | body | true  | string | 文件下载地址                |
| colorCode    | 颜色        | body | true  | int    | 1 黑白 2 彩色             |
| materialCode | 材料        | body | true  | int    | 1 胶版纸/120G 2 铜版纸/128G |

**收件人信息参数实体(receiveInfos)**

| 参数名称            | 说明    | 参数类型 | 是否必须 | 类型     | schema |
| --------------- | ----- | ---- | ---- | ------ | ------ |
| contactMan      | 收件人姓名 | body | true | string | 收件人姓名  |
| contactMobile   | 收件人电话 | body | true | string | 收件人电话  |
| province        | 省     | body | true | string | 省      |
| city            | 市     | body | true | string | 市      |
| county          | 区/县   | body | true | string | 区/县    |
| streetAddress   | 街道/镇  | body | true | string | 街道/镇   |
| detailedAddress | 详细地址  | body | true | string | 详细地址   |

请求示例

```
{
“appId”:”app_id”,
“encryptedParam”:”FvErQAQJKEcqX9dBAF6FVWH4yznEj+f8Cu8GTWEk8VwfBiqzVznTFA==”
}
```

原始参数示例

```
{
    "bookInfoList":[
        {
            "bookName":"书名",
            "totalNumber":10,
            "finishSize":"210*280",
             "bindingTypeCode": 1,
            "indexNo":1,
            "bookFileList":[
                {
                    "partType":"C",
                    "fileName":"tangshuibook-11110-cover.pdf",
                    "fileUrl":"https://bookssl.tangshui.net/tangshuibook-11110-cover.pdf",
                    "colorCode": 1,
                    "materialCode": 1
                },
                {
                    "partType":"P",
                    "fileName":"tangshuibook-11110-inner.pdf",
                    "fileUrl":"https://bookssl.tangshui.net/tangshuibook-11110-inner.pdf",
                    "colorCode": 1,
                    "materialCode": 1
                }
            ]
        }
    ],
    "receiveInfos":{
        "detailedAddress":"fffff",
        "contactMan":"ffaaaa",
        "contactMobile":"18877772222",
        "province":"北京市",
        "city":"广州",
        "county":"东城区",
        "streetAddress":""
    },
    "callBackUrl":"https://testapi.justcome.cn/prints/callback/hucai",
    "outOrderNo":"6180aace9e3aa80028af3ae0"
}
```

**响应状态**

| 状态码 | 说明           | schema           |
| --- | ------------ | ---------------- |
| 200 | OK           | Wrapper«boolean» |
| 201 | Created      |                  |
| 401 | Unauthorized |                  |
| 403 | Forbidden    |                  |
| 404 | Not Found    |                  |

**响应参数**

| 参数名称    | 说明  | 类型      | schema |
| ------- | --- | ------- | ------ |
| code    |     | int32   |        |
| message |     | string  |        |
| result  |     | boolean |        |

**响应示例**

```
{
        "code": 0,
        "message": "",
        "result": true
    }
```

# 修改订单地址

**请求地址**

| 环境   | HTTP地址                                                               |
| ---- | -------------------------------------------------------------------- |
| 测试环境 | http://120.86.125.166:6060/bmc/view/web/mallOrder/updateOrderAddress |
| 正式环境 | http://api.hcpub.cn/bmc/view/web/mallOrder/updateOrderAddress        |

**请求方式** `POST`

**consumes** `["application/json"]`

**produces** `["*/*"]`

**接口描述** ``

```
复制修改地址
```

**schema属性说明**

**提交实体**

| 参数名称           | 说明     | 请求类型 | 是否必须 | 类型     | schema |
| -------------- | ------ | ---- | ---- | ------ | ------ |
| appId          | 机构唯一标识 | body | true | string | 机构唯一标识 |
| encryptedParam | 参数加密信息 | body | true | string | 参数加密信息 |

**加密参数实体**

| 参数名称          | 说明   | 参数类型 | 是否必须  | 类型        | schema               |
| ------------- | ---- | ---- | ----- | --------- | -------------------- |
| orderNo       | 订单号  | body | true  | string    | 单号                   |
| contact       | 联系人  | body | true  | string    | 联系人                  |
| contactPhone  | 联系电话 | body | true  | string    | 联系人电话                |
| address       | 联系地址 | body | true  | string    | 地址                   |
| reason        | 修改原因 | body | false | date-time | 修改原因                 |
| operationType | 操作类型 | body | true  | int32     | 操作类型 0：正常修改 1:取消订单拦截 |

##### 请求示例

```
{  
“appId”:”app\_id”,  
“encryptedParam”:”FvErQAQJKEcqX9dBAF6FVWH4yznEj+f8Cu8GTWEk8VwfBiqzVznTFA==”  
}
```

##### 原始参数示例

```
{    
        "operationType":1,
        "reason":"测试修改",
        "contact":"张三",
        "contactPhone":"13800000000",
        "address": "广东省东莞市虎门镇虎门印艺股份有限公司",
        "orderNo": "JY202106213655"
    }
```

**响应状态**

| 状态码 | 说明           | schema           |
| --- | ------------ | ---------------- |
| 200 | OK           | Wrapper«boolean» |
| 201 | Created      |                  |
| 401 | Unauthorized |                  |
| 403 | Forbidden    |                  |
| 404 | Not Found    |                  |

**响应参数**

| 参数名称    | 说明  | 类型     | schema |
| ------- | --- | ------ | ------ |
| code    |     | int32  |        |
| message |     | string |        |
| result  |     | string |        |

**响应示例**

```
{
        "code": 0,
        "message": "处理中",
        "result": "29"
    }
```

# 修改文件信息

请求地址  
| 环境 | http地址 |  
| —————— | —————— |  
| 测试环境 | http://120.86.125.166:6060/bmc/view/web/order/upladeFileInfos |  
| 正式环境 | http://api.hcpub.cn/bmc/view/web/order/upladeFileInfos |

请求方式 `POST`

consumes `["application/json"]`

produces `["*/*"]`

接口描述

```
修改订单某些文件信息
```

schema属性说明

**订单提交实体**

| 参数名称           | 说明     | 请求类型 | 是否必须 | 类型     | schema |
| -------------- | ------ | ---- | ---- | ------ | ------ |
| appId          | 机构唯一标识 | body | true | string | 机构唯一标识 |
| encryptedParam | 参数加密信息 | body | true | string | 参数加密信息 |

**订单加密参数实体**

| 参数名称         | 说明     | 参数类型 | 是否必须 | 类型           | schema    |
| ------------ | ------ | ---- | ---- | ------------ | --------- |
| bookFileList | 书目文件信息 | body | true | bookFileList |           |
| outOrderNo   | 外部订单号  | body | true | string       | 外部系统唯一订单号 |

**书目文件信息参数试题(bookFileList)**

| 参数名称     | 说明        | 请求类型 | 是否必须  | 类型     | schema   |
| -------- | --------- | ---- | ----- | ------ | -------- |
| itemNo   | 订单行号      | body | true  | int    | 外部系统订单行号 |
| partType | 部件类型(C/P) | body | true  | string | C封面、P内页  |
| fileName | 文件名称      | body | false | string | 文件名称     |
| fileUrl  | 文件下载地址    | body | true  | string | 文件下载地址   |

请求示例

```
{
“appId”:”app_id”,
“encryptedParam”:”FvErQAQJKEcqX9dBAF6FVWH4yznEj+f8Cu8GTWEk8VwfBiqzVznTFA==”
}
```

原始参数示例

```
{
    "bookFileList":[
        {
            "itemNo":1,
            "partType":"C",
            "fileName":"tangshuibook-11110-cover.pdf",
            "fileUrl":"https://bookssl.tangshui.net/tangshuibook-11110-cover.pdf"
        },
        {
            "itemNo":1,
            "partType":"P",
            "fileName":"tangshuibook-11110-inner.pdf",
            "fileUrl":"https://bookssl.tangshui.net/tangshuibook-11110-inner.pdf"
        }
    ],
    "outOrderNo":"6180aace9e3aa80028af3ae0"
}
```

**响应状态**

| 状态码 | 说明           | schema           |
| --- | ------------ | ---------------- |
| 200 | OK           | Wrapper«boolean» |
| 201 | Created      |                  |
| 401 | Unauthorized |                  |
| 403 | Forbidden    |                  |
| 404 | Not Found    |                  |

**响应参数**

| 参数名称    | 说明  | 类型      | schema |
| ------- | --- | ------- | ------ |
| code    |     | int32   |        |
| message |     | string  |        |
| result  |     | boolean |        |

**响应示例**

```
{
        "code": 0,
        "message": "",
        "result": true
    }
```

# 订单信息回写

## 正常下单回调请求

请求参数格式：

```
{
    "msg":"下单成功",
    "code":1200,
    "data":{
        "orderNo":"2021070700001",
        "outOrderNo":"外部订单号,全局保持唯一",
    }
}
```

状态返回格式 - 生产中：

```
{
    "msg":"更新订单状态成功",
    "code":1201,
    "data":{
        "orderNo":"2021070700001",
        "outOrderNo":"外部订单号,全局保持唯一"
    }
}
```

状态返回格式 - 已发货：

```
{
    "msg":"物流已发货",
    "code":1202,
    "data":{
        "orderNo":"2021070700001",
        "outOrderNo":"外部订单号,全局保持唯一",
        "params":[
         {
                "indexNo":1,
                "company":"跨越快递",
                "logisticsMode":"专车直送",
                "packageType":"自然包+铁路包",
                "number":"10"
            },
        ]
    }
}
```

文件检测失败案例

```
{
    "msg":"文件异常",
    "code":1501,
    "data":{
        "orderNo":"2021070700001",
        "outOrderNo":"外部订单号,全局保持唯一",
        "params":[
            {
                "indexNo":1,
                "partType":"C",
                "fileName":"2021051300002_1_C.pdf",
                "fileUrl":"http:efs.com/in1/2021051300002_1/2021051300002_1_C.pdf",
                "msg":"文件损坏",
                "status":500
            },
            {
                "indexNo":2,
                "partType":"P",
                "fileName":"2021051300002_1_P.pdf",
                "fileUrl":"http:efs.com/in1/2021051300002_1/2021051300002_1_P.pdf",
                "msg":"文件下载失败",
                "status":404
            }
        ]
    }
}
```

返回参数

```
{
    "code":12xx,
    "message":"成功"
}
```

```
{
    "code":15xx,
    "message":"失败"
}
```
