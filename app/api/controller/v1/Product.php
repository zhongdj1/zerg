<?php
declare (strict_types = 1);

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\BaseController;
use app\api\model\Product as ProductModel;
use app\lib\exception\ProductException;
use think\Collection;

class Product extends BaseController
{
    /**
     * 根据category_id查找该分类下的商品列表
     * @param $id 分类id
     */
    public function byCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        return $products;
    }

    /**
     * 最近商品列表
     * @param int $count
     * @return Collection
     */
    public function recent($count=15)
    {
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        return $products;
    }

    public function detail($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProduct($id);
        if (!$product) {
            throw new ProductException();
        }
        return $product;
    }
}
