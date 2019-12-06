<?php
declare (strict_types = 1);

namespace app\api\validate;

class AddressNew extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.isNotEmpty' => '姓名不能为空',
        'province.isNotEmpty' => '省不能为空',
        'city.isNotEmpty' => '城市不能为空',
        'country.isNotEmpty' => '区不能为空',
        'detail.isNotEmpty' => '详情地址不能为空',
    ];
}
