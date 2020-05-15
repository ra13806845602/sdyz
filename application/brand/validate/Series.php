<?php

namespace app\brand\validate;

use think\Validate;

class Series extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'brand_id|品牌' => 'require',
        'name|系列' => 'require',
        'status|状态' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [];
}
