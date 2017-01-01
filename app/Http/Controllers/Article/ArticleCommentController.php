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
        // $article->addComment(
        //     new ArticleComment($request->all())
        // );

        // 增加验证
        $this->validate($request, [
            'content' => 'required|min:10',
        ]);

        dump($errors);exit;
        // 增加评论者ID
        $comment = new ArticleComment($request->all());
        // $comment->by(Auth::user());
        // $comment->by(1);
        // $comment->user_id = 1;
        $article->addComment($comment, 1);

        return back();
    }

    public function edit(Article $article, ArticleComment $comment) {
        return view('article.comment_edit', compact('article', 'comment'));
    }

    public function update(Request $request, Article $article, ArticleComment $comment) {
        $comment->update($request->all());
        
        return back();
    }
}
