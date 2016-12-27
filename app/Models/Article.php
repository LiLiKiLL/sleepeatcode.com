<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments() {
        // return $this->hasMany('App\ArticleComment');
        // or
        return $this->hasMany(ArticleComment::class);
    }

    public function addComment(ArticleComment $comment) {
        return $this->comments()->save($comment);
    }
}
