<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;

class AdminAuth
{
    public $isLogin;
    public $nickname;

    /**
     * 返回请求过滤器
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
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
            }
        }
        if (!$this->isLogin) {
            return redirect(route('admin_login'));
        }

        return $next($request);
    }
}
