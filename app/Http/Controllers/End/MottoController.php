<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\EndBaseController;
use App\Models\Motto;
use Input, Request;
use App\Services\ErrMapping;

class MottoController extends EndBaseController
{
    protected $viewPrefix = 'end/motto/';

    public function add()
    {
        if (Request::isMethod('get')) {
            return view($this->viewPrefix . 'add');
        } else {
            $rules = [
                'content' => 'required|string|max:256',
                'author' => 'required|string|max:20',
            ];
            if (true === $this->_checkParams($rules)) {
                $content = Input::get('content');
                $author = Input::get('author');
                $motto = new Motto();
                $id = $motto->add($content, $author);
                return redirect(route('motto_list'));
            }

            return $this->_jsonOutput();
        }
    }

    public function getList()
    {
        $motto = new Motto();
        $result = $motto->getList();
        $data = ['data' => $result];

        return view($this->viewPrefix . 'list', $data);
    }

    public function edit($id)
    {
        $rules = [];
        if (true === $this->_checkParams($rules)) {
            $motto = new Motto();
            if (Request::isMethod('get')) {
                $result = $motto->info($id);
                $data = ['motto' => $result];

                return view($this->viewPrefix . 'edit', $data);
            } else {
                $content = Input::get('content');
                $author = Input::get('author');
                $result = $motto->edit($id, $content, $author);
                return redirect(route('motto_list'));
            }
        }

        return $this->_jsonOutput();
    }
}