@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $article->title }}</h1>
            <ul class="list-group">
            @foreach ($article->comments as $comment) 
                <li class="list-group-item">{{ $comment->content }}</li>
            @endforeach
            </ul>
            <hr>
            <h3>Add a new article</h3>
            
            <form action="/article/{{ $article->id }}/comment" method="POST">
                <div class="form-group">
                    <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Article</button>
                </div>
            </form>
        </div>
    </div>
@stop