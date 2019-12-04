<?php
declare (strict_types = 1);

namespace app\api\validate;

class Count extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */
    protected $message = [
        'count.isPositiveInteger' => 'count必须为正整数'
    ];
}
