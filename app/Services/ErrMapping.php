<?php
namespace App\Services;

class ErrMapping
{
    const ERR_BAD_PARAMETERS = 1001;
    const ERR_REG_PASSWORD_NOT_MATCH = 1002;
    const ERR_INTERNAL_SERVER_ERR = 1003;
    const ADMIN_AUTH_FAIL = 1004;

    static $msg = [
        self::ERR_BAD_PARAMETERS => '参数错误',
        self::ERR_REG_PASSWORD_NOT_MATCH => '密码不匹配',
        self::ERR_INTERNAL_SERVER_ERR => '系统错误',
        self::ADMIN_AUTH_FAIL => '登录失败',
    ];

    public static function getMessage($code, $params = array())
    {
        if (isset(self::$msg[$code])) {
            $result = self::$msg[$code];
            $result = self::_replacePlaceholder($result, $params);
        } else {
            $result = '';
        }

        return $result;
    }

    private static function _replacePlaceholder($msg, $params)
    {
        foreach ($params as $placeholder => $val) {
            $msg = str_replace('{' . $placeholder . '}', $val, $msg);
        }

        return $msg;
    }
}