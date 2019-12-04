<?php
declare (strict_types = 1);

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\BaseController;
use app\lib\exception\ThemeException;
use think\facade\Request;
use app\api\model\Theme as ThemeModel;

class Theme extends BaseController
{
    /**
     * 根据主题id获取主题以及对应的图片
     * @param string $ids 1,2,3
     * @return string
     * @throws \app\lib\exception\ParameterException
     */
    public function index($ids='')
    {
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with(['topicImg', 'headImg'])
            ->select($ids);
        if ($result->isEmpty()) {
            throw new ThemeException();
        }
        return $result;
    }

    public function create()
    {
        //
    }

    public function save(Request $request)
    {
        //
    }

    public function read($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $result = ThemeModel::getThemeWithProducts($id);
        return $result;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
