@extends('common.layout')
@section('css')
<style>
body {
    background-image: url('images/background.jpeg');
    background-position: top left;
    background-repeat: no-repeat;
}
#portrait {
    width: 100px;
    height: 100px;
    border-radius: 999px;
}
.white-color {
    color: white;
}
.gray-color {
    color: gray;
}
a.btn-lg {
    /*background:rgba(255,255,255,0.1);*/
    opacity: 0.8;
    color:black;
    border:1px;
    border-color:gray;
    border-radius: 30px;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin-top:50px;">
        <div class="col-md-12 text-center">
            <img src="/images/portrait.gif" alt="头像" id="portrait">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class=" white-color">陈旭</h1>
            <h3 class="gray-color">越努力，越幸运。</h3>
        </div>
    </div>
    <hr style="width:30%;background-color:gray;height:1px;border:0;">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="/blog" class="btn btn-default btn-lg">博客</a>
            <a href="/resume" class="btn btn-default btn-lg">关于我</a>
        </div>
    </div>
</div>
@endsection