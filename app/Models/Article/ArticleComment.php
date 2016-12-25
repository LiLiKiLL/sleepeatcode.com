<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $fillable = ['content'];

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
