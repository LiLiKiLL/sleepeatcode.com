@extends('end.layout')
@section('title', '后台管理员注册')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="" role="form" method="post">
            <div class="form-group">
                <label for="nickname">用户名：</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入用户名">
            </div>
            <div class="form-group">
                <label for="password">密码：</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
            </div>
            <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" id="remember">记住我
                </label>
            </div>
            <button type="submit" class="btn btn-default">登录</button>
        </form>
    </div>
</div>
@endsection