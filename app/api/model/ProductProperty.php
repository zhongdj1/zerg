<?php
declare (strict_types = 1);

namespace app\api\model;

class ProductProperty extends BaseModel
{
    protected $hidden = ['product_id', 'id', 'delete_time'];
}
