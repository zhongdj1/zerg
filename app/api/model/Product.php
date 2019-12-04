<?php
declare (strict_types = 1);

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'create_time', 'update_time',
        'main_img_id', 'pivot', 'from', 'category_id'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    public static function getMostRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        $products->hidden(['summary', 'delete_time', 'category_id', 'main_img_url',
            'from', 'create_time', 'update_time']);
        return $products;
    }

    public static function getProductsByCategoryID($category_id)
    {
        $products = self::where('category_id', '=', $category_id)
            ->select();
        $products->hidden(['summary', 'delete_time', 'category_id', 'main_img_url',
            'from', 'create_time', 'update_time']);
        return $products;
    }
}
