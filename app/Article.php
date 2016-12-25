<?php

namespace App\Article;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function article_comments() {
        // return $this->hasMany('App\ArticleComment');
        // or
        return $this->hasMany(ArticleComment::class);
    }
}
