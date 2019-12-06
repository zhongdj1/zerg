<?php
declare (strict_types = 1);

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        // 接收参数 -> 检验参数
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error
            ]);
            throw $e;
        } else {
            return true;
        }
    }

    protected function isPositiveInteger($value, $rule='', $data = [], $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return false;
    }

    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        }
        return false;
    }

    protected function isNotEmpty($value, $rule='', $data = [], $field = '')
    {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    public function getDataByRule($data)
    {
        if (array_key_exists('user_id', $data) || array_key_exists('uid', $data)) {
            throw new ParameterException([
                'msg' => '参数中包含有非法的参数名user_id或者uid'
            ]);
        }
        $newData = [];
        foreach ($this->rule as $key => $value) {
            $newData[$key] = $data[$key];
        }
        return $newData;
    }
}
