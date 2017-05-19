<?php
namespace App\Http\Controllers\End\Page;

use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    protected $viewPrefix = 'end/bookmark/';

    public function add()
    {
        return view($this->viewPrefix . 'add');
    }

    public function list()
    {
        return view($this->viewPrefix . 'list');
    }
}