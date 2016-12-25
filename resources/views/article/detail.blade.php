@extends('layout')

@section('content')
<h1>{{ $article->title }}</h1>
    <ul>
    @foreach ($article->comments as $comment) 
        <li>{{ $comment->content }}</li>
    @endforeach
    </ul>
@stop