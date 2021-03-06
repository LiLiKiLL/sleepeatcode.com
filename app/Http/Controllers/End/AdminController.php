<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\BaseController;
use App\Services\ErrMapping;
use App\Models\Admin;
use Input, Log, Request;

class AdminController extends BaseController
{
    protected $viewPrefix = 'end/auth/';

    public function register()
    {
        if (Request::isMethod('get')) {
            return view($this->viewPrefix . 'register');
        } else {
            $rules = [
                'nickname' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirm' => 'required|same:password',
            ];
            if (true === $this->_checkParams($rules)) {
                try {
                    $nickname = Input::get('nickname');
                    $email = Input::get('email');
                    $password = Input::get('password');
                    $passwordConfirm = Input::get('password_confirm');
                    $admin = new Admin();
                    $id = $admin->register($nickname, $email, $password);
                    $this->_result['desc'] = 'Hi，' . $nickname . '，注册成功。';
                }
                catch (\Exception $e) {
                    $this->_errCode = ErrMapping::ERR_INTERNAL_SERVER_ERR;
                    Log::warning(sprintf('class[%s] func[%s] line[%s] msg[%s] trace[%s]', __CLASS__, __FUNCTION__, __LINE__, $e->getMessage(), $e->getTraceAsString()));
                }
            }

            return $this->_jsonOutput();
        }
    }

    public function login()
    {
        if (Request::isMethod('get')) {
            return view($this->viewPrefix . 'login');
        } else {
            $rules = [
                'nickname' => 'required',
                'password' => 'required',
            ];
            if (true === $this->_checkParams($rules)) {
                try {
                    $nickname = Input::get('nickname');
                    $password = Input::get('password');
                    $admin = new Admin();
                    $adminInfo = $admin->login($nickname, $password);
                    if ($adminInfo) {
                        $rememberToken = md5($adminInfo['email'] . time());
                        $admin->updateRememberToken($adminInfo['id'], $rememberToken);
                        session(['remember_token' => $rememberToken]);
                        // $this->_result = ['desc' => '欢迎你，' . $nickname . '。'];
                        return redirect(route('end_index'));
                    } else {
                        $this->_errno = ErrMapping::ADMIN_AUTH_FAIL;
                    }
                }
                catch (\Exception $e) {
                    $this->_errCode = ErrMapping::ERR_INTERNAL_SERVER_ERR;
                    Log::warning(sprintf('class[%s] func[%s] line[%s] msg[%s] trace[%s]', __CLASS__, __FUNCTION__, __LINE__, $e->getMessage(), $e->getTraceAsString()));
                }
            }

            return $this->_jsonOutput();
        }
    }

    public function logout()
    {
        Request::session()->forget('remember_token');
        return view($this->viewPrefix . 'login');
    }
}