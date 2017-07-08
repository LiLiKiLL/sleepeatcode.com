<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use App\Models\Article;
use App\Models\Motto;
use Input;

class PageController extends BaseController
{
    public function __construct()
    {
        $article = new Article();
        $tags = $article->getAllTags();
        view()->share('tags', $tags);

        $motto = new Motto();
        $mottoInfo = $motto->random();
        view()->share('motto', $mottoInfo);
    }

    public function home()
    {
        return view('index');
    }

    public function blog()
    {
        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 10);
        $conds = array();
        $article = new Article();
        $result = $article->getList($conds, $page, $pageSize);
        $data = ['articles' => $result];

        return view('front/blog', $data);
    }

    public function blogView($id)
    {
        $article = new Article();
        $article->read($id);// 阅读量+1
        $result = $article->info($id);
        $data = ['article' => $result];

        return view('front/blog_view', $data);
    }

    public function resume()
    {
        return view('front/resume');
    }

    /**
     * 根据tag返回博客列表
     * @return [type] [description]
     */
    public function blogTag($tag)
    {
        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 10);
        $article = new Article();
        $result = $article->getByTag($tag, $page, $pageSize);
        $data = ['articles' => $result];

        return view('front/blog', $data);
    }
}
