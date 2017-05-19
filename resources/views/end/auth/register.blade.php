@extends('end.endlayout')
@section('title', '后台管理员登录')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="/api/admin/register" role="form" method="post">
            <div class="form-group">
                <label for="nickname">用户名：</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入用户名">
            </div>
            <div class="form-group">
                <label for="email">邮箱：</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="请输入邮箱">
            </div>
            <div class="form-group">
                <label for="password">密码：</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
            </div>
            <div class="form-group">
                <label for="password_confirm">确认密码：</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="请确认密码">
            </div>
            <button type="submit" class="btn btn-default">注册</button>
        </form>
    </div>
</div>
@endsection