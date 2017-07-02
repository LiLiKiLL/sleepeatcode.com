<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use App\Models\Article;

class PageController extends BaseController
{

    public function home()
    {
        return view('index');
    }

    public function blog()
    {
        $article = new Article();
        $result = $article->getList();
        $data = ['data' => $result];

        return view('front/blog', $data);
    }

    public function blogView($id)
    {
        $article = new Article();
        $article->read($id);// 阅读量+1
        $result = $article->info($id);
        $data = ['data' => $result];

        return view('front/blog_view', $data);
    }

    public function resume()
    {
        return view('front/resume');
    }
}
