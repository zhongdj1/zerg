<?php

use think\facade\Env;

return [
    'img_prefix' => Env::get('app.host', '') . '/images',
];
