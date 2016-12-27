<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\ArticleComment;

class ArticleCommentController extends Controller
{
    public function add(Request $request, Article $article) {
        // 方式一
        // $comment = new ArticleComment();
        // $comment->content = $request->content;
        // $article->comments()->save($comment);

        // 方式二
        // $comment = new ArticleComment(['content' => $request->content]);
        // $article->comments()->save($comment);

        // 方式三
        // $article->comments()->save(
        //     new ArticleComment(['content' => $request->content])
        // );

        // 方式四
        // $article->comments()->create([
        //     'content' => $request->content
        // ]);

        // 方式五
        // $article->comments()->create($request->all());

        // 方式六
        $article->addComment(
            new ArticleComment($request->all())
        );

        return back();
    }
}
