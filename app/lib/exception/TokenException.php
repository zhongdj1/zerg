<?php
declare (strict_types = 1);

namespace app\lib\exception;

class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}
