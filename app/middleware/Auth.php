<?php
declare (strict_types = 1);

namespace app\middleware;

use app\api\service\Token;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;

class Auth
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        $scope = Token::getCurrentTokenVar('scope');
        if ($scope) {
            if ($scope >= ScopeEnum::User) {
                return $next($request);
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }

    }
}
