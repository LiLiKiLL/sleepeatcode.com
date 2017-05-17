<?php
namespace App\Http\Controllers\End\Page;

use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    protected $viewPrefix = 'end/auth/';

    public function register()
    {
        return view($this->viewPrefix . 'register');
    }

    public function login()
    {
        return view($this->viewPrefix . 'login');
    }
}