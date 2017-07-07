<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Admin;

class EndBaseController extends BaseController
{
    public $nickname;

    public function isLogin()
    {
        $isLogin = false;
        $admin = new Admin();
        $rememberToken = session('remember_token');
        if (! empty($rememberToken)) {
            $adminInfo = $admin->getInfoByRememberToken($rememberToken);
            if ($adminInfo) {
                $this->nickname = $adminInfo['nickname'];
                $isLogin = true;
            }
        }

        return $isLogin;
    }
}