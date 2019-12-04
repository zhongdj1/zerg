<?php

use think\facade\Env;

return [
    'img_prefix' => Env::get('app.host', '') . '/images',
    'token_expire_in' => 7200
];
