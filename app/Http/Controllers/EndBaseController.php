<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Request;

class EndBaseController extends BaseController
{
    public $isLogin;
    public $nickname;

    public function __construct()
    {
        $this->isLogin = false;
        $this->nickname = '';
        $admin = new Admin();
        $rememberToken = session('remember_token');
        if (! empty($rememberToken)) {
            $adminInfo = $admin->getInfoByRememberToken($rememberToken);
            if ($adminInfo) {
                $this->nickname = $adminInfo['nickname'];
                $this->isLogin = true;
                view()->share('nickname', $this->nickname);
            }
        }
    }

    public function checkLogin()
    {
        if (!$this->isLogin) {
            return view('end.auth.login');
        }
    }
}