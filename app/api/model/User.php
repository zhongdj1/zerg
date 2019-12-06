<?php
declare (strict_types = 1);

namespace app\api\model;


class User extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public function address()
    {
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }

    public static function getByOpenID($openid)
    {
        $user = self::where('openid', '=', $openid)
            ->find();
        return $user;
    }


}
