<?php
namespace App\Http\Controllers\Article;

use App\Http\Controllers\BaseController;
use App\Models\Article\Article;
use DB;

class ArticleController extends BaseController {
    public function index() {
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    public function detail(Article $article) {
        return view('article.detail', compact('article'));
    }
}