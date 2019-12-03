<?php
declare (strict_types = 1);

namespace app\lib\exception;

use think\exception\Handle;
use think\facade\Log;
use think\Response;
use Throwable;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    // 需要返回客户端当前请求的URL路径

    public function render($request, Throwable $e): Response
    {
        // 自定义异常
        if ($e instanceof BaseException) {
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if (config('app.show_error_msg')) {
                return parent::render($request, $e);
            } else {
                $this->code = 500;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }

        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result, $this->code);
    }

    private function recordErrorLog(Throwable $e)
    {
        Log::record($e->getMessage(), 'error');
    }
}
