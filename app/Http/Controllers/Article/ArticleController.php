<?php
namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use DB;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    public function detail(Article $article) {
        return view('article.detail', compact('article'));
    }
}