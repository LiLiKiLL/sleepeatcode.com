<?php
namespace App\Http\Controllers\End\Page;

use App\Http\Controllers\BaseController;
use App\Models\Article;
use Input, Request;

class ArticleController extends BaseController
{
    protected $viewPrefix = 'end/article/';

    public function add()
    {
        return view($this->viewPrefix . 'add');
    }

    public function getList()
    {
        $article = new Article();
        $result = $article->getList();
        $data = ['data' => $result];

        return view($this->viewPrefix . 'list', $data);
    }

    public function edit()
    {
        $rules = [
            'id' => 'required',
        ];
        if (true === $this->_checkParams($rules)) {
            $article = new Article();
            $id = Input::get('id');
            if (Request::isMethod('get')) {
                $result = $article->info($id);
                $data = ['data' => $result];

                return view($this->viewPrefix . 'edit', $data);
            }
            if (Request::isMethod('post')) {
                $data = Input::all();
                $result = $article->edit($id, $data);

                return redirect(route('article_list'));
            }
        }

        return $this->_jsonOutput();
    }

    public function delete()
    {
        $rules = [
            'id' => 'required',
        ];
        if (true === $this->_checkParams($rules)) {
            $id = Input::get('id');
            $article = new Article();
            $result = $article->del($id);
        }

        return redirect(route('article_list'));
    }

    public function preview()
    {
        $rules = [
            'id' => 'required',
        ];
        if (true === $this->_checkParams($rules)) {
            $id = Input::get('id');
            $article = new Article();
            $result = $article->info($id);
            $data = ['data' => $result];

            return view($this->viewPrefix . 'preview', $data);
        }

        return $this->_jsonOutput();
    }
}