@extends('layout')

@section('content')
    <h1>Motto detail</h1>
    {{ $motto->author }} ： {{ $motto->content }} <br />
@stop