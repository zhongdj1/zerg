<?php
declare (strict_types = 1);

namespace app\api\model;

class Banner extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time'];

    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerByID($id)
    {
        $banner = self::with(['items', 'items.img'])
            ->find($id);

        return $banner;
    }
}
