<?php

use think\facade\Env;

return [
    'app_id' => Env::get('wechat.appid', ''),
    'app_secret' => Env::get('wechat.secret', ''),
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code"
];
