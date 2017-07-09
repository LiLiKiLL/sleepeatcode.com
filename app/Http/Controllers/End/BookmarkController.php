<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\EndBaseController;

class BookmarkController extends EndBaseController
{
    protected $viewPrefix = 'end/bookmark/';

    public function add()
    {
        return view($this->viewPrefix . 'add');
    }

    public function getList()
    {
        return view($this->viewPrefix . 'list');
    }
}