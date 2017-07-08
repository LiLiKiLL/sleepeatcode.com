<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\EndBaseController;

class IndexController extends EndBaseController
{
    public function index()
    {
        return view('end.index');
    }
}