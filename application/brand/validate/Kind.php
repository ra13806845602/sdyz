<?php

namespace app\brand\validate;

use think\Validate;

class Kind extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'number|编码' => 'require|unique:kind',
        'series_id|系列' => 'require',
        'refraction_id|折射率' => 'require',
        'degree_id|度数' => 'require',
        'astigmatism_id|散光' => 'require',
        'plus|正/负' => 'require',
        'ball|球/非球' => 'require',
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
