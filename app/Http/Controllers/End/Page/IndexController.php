<?php
namespace App\Http\Controllers\End\Page;

use App\Http\Controllers\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        return view('end.index');
    }
}