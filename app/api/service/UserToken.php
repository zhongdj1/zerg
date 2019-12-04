<?php


namespace app\api\service;


use app\api\model\User;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wechat.app_id');
        $this->wxAppSecret = config('wechat.app_secret');
        $this->wxLoginUrl = sprintf(config('wechat.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
    }

    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('微信内部错误');
        } else {
            $loginFail = array_key_exists('errorCode', $wxResult);
            if ($loginFail) {
                $this->processLoginError($wxResult);
            } else {
                $this->grantToken($wxResult);
            }
        }
        return $wxResult;
    }

    private function grantToken($wxResult)
    {
        // 拿到openid
        // 判断数据库里面openid是否已存在，不存在就新增一条user记录
        // 生成令牌，准备缓存数据，写入缓存
        // 把令牌返回到客户端
        $openid = $wxResult['openid'];
        $user = User::getByOpenID($openid);
        if ($user) {
            $uid = $user->id;
        } else {
            $uid = $this->newUser($openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult, $uid);
    }

    private function saveToCache($cachedValue)
    {
        $key = generateToken();
    }

    private function prepareCachedValue($wxResult, $uid)
    {
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;
        return $cachedValue;
    }

    private function newUser($openid)
    {
        $user = User::create([
            'openid' => $openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult)
    {
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}
