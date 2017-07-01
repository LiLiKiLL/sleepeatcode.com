<?php
namespace App\Http\Controllers\Article;

use App\Http\Controllers\BaseController;
use Input;
use App\Models\Article;

class ArticleController extends BaseController
{
    public function add()
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        if (true === $this->_checkParams($rules)) {
            $data = Input::all();
            $article = new Article();
            $id = $article->add($data);
            $this->_result['id'] = $id;
        }

        return $this->_jsonOutput();
    }
}