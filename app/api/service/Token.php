<?php
declare (strict_types = 1);

namespace app\api\service;


class Token
{
    public static function generateToken()
    {
        $randChars = getRandChar(32);
        $timestamp = time();
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }
}