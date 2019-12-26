<?php
declare (strict_types = 1);

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\BaseController;
use app\lib\exception\BannerMissException;

class Banner extends BaseController
{
    public function index()
    {
    }

    /**
     * 根据id获取banner以及banner下面的banner_item
     * @param $id
     * @return array|\think\Model|null
     */
    public function read($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}
