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
        $data = ['articles' => $result];
        $tags = $article->getAllTags();
        $data['tags'] = $tags;

        return view('front/blog', $data);
    }

    public function blogView($id)
    {
        $article = new Article();
        $article->read($id);// 阅读量+1
        $result = $article->info($id);
        $data = ['article' => $result];
        $tags = $article->getAllTags();
        $data['tags'] = $tags;

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
        $article = new Article();
        $result = $article->getByTag($tag);
        $data = ['articles' => $result];
        $tags = $article->getAllTags();
        $data['tags'] = $tags;

        return view('front/blog', $data);
    }

    public function blogTags()
    {
        $article = new Article();
        $tags = $article->getAllTags();

    }
}
