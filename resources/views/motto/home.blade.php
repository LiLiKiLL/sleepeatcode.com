@extends('layout')

@section('content')
    <h1>All mottos</h1>
    @foreach ($mottos as $motto)
        {{ $motto->author }} ： {{ $motto->content }} <br />
    @endforeach
@stop