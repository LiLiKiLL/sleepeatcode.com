@extends('layout')

@section('content')
<h1>Articles List</h1>
    <ul>
    @foreach ($articles as $article) 
        <li><a href="/article/{{ $article->id }}">{{ $article->title }}</a></li>
    @endforeach
    </ul>
@stop