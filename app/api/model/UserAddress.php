<?php
declare (strict_types = 1);

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['delete_time', 'id', 'user_id'];
}
