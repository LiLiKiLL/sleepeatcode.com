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
        // $article = new Article();
        // return $article->all();
        // return $article->with('comments')->get();
        // $article = $article->with('comments')->find(1);// 返回id=1的评论数据
        // $article = $article->with('comments.user')->find(1);// 返回带评论和评论者信息的数据
        // return $article;
        // return $article->comments[0]->user();
        // return $article->comments[0]->user;// 返回评论者数据
        $article->load('comments.user');
        // return $article;
        return view('article.detail', compact('article'));
    }
}