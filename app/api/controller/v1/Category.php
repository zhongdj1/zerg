<?php
declare (strict_types = 1);

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\BaseController;
use app\lib\exception\CategoryException;

class Category extends BaseController
{
    public function index()
    {
        $categories = CategoryModel::with('img')->select();
        if ($categories->isEmpty()) {
            throw new CategoryException();
        }
        return $categories;
    }
}
