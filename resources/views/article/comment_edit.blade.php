@extends('layout')

@section('content')
    <h1>Edit Article Comment</h1>
    <form action="/article/{{ $article->id }}/comment/{{ $comment->id }}" method="POST">
        {{ method_field('PATCH') }}
        <div class="form-group">
            <textarea name="content" class="form-control" id="" cols="30" rows="10">
                {{ $comment->content }}
            </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Article Comment</button>
        </div>
    </form>
@stop