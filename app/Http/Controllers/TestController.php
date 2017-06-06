<?php
namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class TestController extends BaseController
{
    public function foo()
    {
        $rules = [];
        if (true === $this->_checkParams($rules)) {

        }

        return $this->_jsonOutput();
    }

    public function session1()
    {

    }
}