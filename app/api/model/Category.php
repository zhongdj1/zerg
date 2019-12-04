<?php
declare (strict_types = 1);

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'topic_img_id'];

    public function Img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
}
