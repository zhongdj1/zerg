<?php
declare (strict_types = 1);

namespace app\api\controller\v1;

use app\api\model\User as UserModel;
use app\api\validate\AddressNew;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use think\Request;
use app\api\service\Token as TokenService;

class Address
{
   public function createOrUpdate()
   {
       $validate = new AddressNew();
       $validate->goCheck();
       // 根据Token获取uid
       // 根据uid查找用户信息
       // 接收数据
       // 用户地址是否已存在，存在则更新

       $uid = TokenService::getCurrentUid();
       $user = UserModel::find($uid);
       if (!$user) {
           throw new UserException();
       }
       $data = $validate->getDataByRule(input('post.'));
       $userAddress = $user->address;
       if (!$userAddress) {
           $user->address()->save($data);
       } else {
           $user->address->save($data);
       }
       return json(new SuccessMessage(), 201);
   }
}
