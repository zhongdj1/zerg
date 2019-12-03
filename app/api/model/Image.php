<?php
declare (strict_types = 1);

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'update_time', 'delete_time'];

    public function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }
}
