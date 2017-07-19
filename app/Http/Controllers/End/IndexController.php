<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\EndBaseController;

class IndexController extends EndBaseController
{
    public function index()
    {
        if ($this->isLogin) {
            return view('end.index');
        }

        return redirect(route('admin_login'));
    }
}