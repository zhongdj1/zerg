<?php
declare (strict_types = 1);

namespace app\api\model;

class ProductImage extends BaseModel
{
    protected $hidden = ['product_id', 'img_id', 'delete_time'];

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}
