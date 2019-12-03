<?php
declare (strict_types = 1);

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\BaseController;
use app\lib\exception\BannerMissException;
use think\facade\Request;

class Banner extends BaseController
{
    public function index()
    {
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
        $banner = BannerModel::getBannerByID($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return $banner;
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
