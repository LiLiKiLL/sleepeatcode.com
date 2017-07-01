<?php
namespace App\Http\Controllers\End\Page;

use App\Http\Controllers\BaseController;
use App\Models\Article;
use Input, Request;
use App\Services\ErrMapping;

class ArticleController extends BaseController
{
    protected $viewPrefix = 'end/article/';

    public function add()
    {
        if (Request::isMethod('post')) {
            $rules = [
                'title' => 'required|string|max:20',
                'abstract' => 'string|max:54',
                'tag' => 'string|max:128',
                'content' => 'required',
            ];
            if (true === $this->_checkParams($rules)) {
                $params = Input::all();
                $article = new Article();
                $id = $article->add($params);
                return redirect(route('article_list'));
            }
        } else {
            return view($this->viewPrefix . 'add');
        }
    }

    public function getList()
    {
        $article = new Article();
        $result = $article->getList();
        $data = ['data' => $result];

        return view($this->viewPrefix . 'list', $data);
    }

    public function edit($id)
    {
        $rules = [];
        if (true === $this->_checkParams($rules)) {
            $article = new Article();
            if (Request::isMethod('get')) {
                $result = $article->info($id);
                $data = ['data' => $result];

                return view($this->viewPrefix . 'edit', $data);
            }
            if (Request::isMethod('post')) {
                $params = Input::all();
                $result = $article->edit($id, $params);
                return redirect(route('article_list'));
            }
        }

        return $this->_jsonOutput();
    }

    public function delete($id)
    {
        $rules = [];
        if (true === $this->_checkParams($rules)) {
            $article = new Article();
            $result = $article->del($id);
        }

        return redirect(route('article_list'));
    }

    public function preview($id)
    {
        $rules = [];
        if (true === $this->_checkParams($rules)) {
            $article = new Article();
            $result = $article->info($id);
            $data = ['data' => $result];

            return view($this->viewPrefix . 'preview', $data);
        }

        return $this->_jsonOutput();
    }
}