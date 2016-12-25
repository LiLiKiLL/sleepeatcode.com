@extends('layout')

@section('content')
<h1>People</h1>
@foreach ($people as $person) 
    <li>{{ $person }}</li>
@endforeach
@stop