<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['content'];

    public function comments() {
        // return $this->hasMany('App\ArticleComment');
        // or
        return $this->hasMany(ArticleComment::class);
    }
}
