@extends('common.layout')
@section('content')
<div class="container-fluid">
    <div class="row full-width-row">
        <div class="col-md-4">
            @include('common.nav')
        </div>
        <div class="col-md-8">
            @yield('main_content')
        </div>
    </div>
</div>
@endsection
