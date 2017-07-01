@extends('end.layout')
@section('title', '后台管理员注册')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form role="form" id="register-form">
            <div class="form-group">
                <label for="nickname">*用户名：</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入3-16个字符的用户名">
            </div>
            <div class="form-group">
                <label for="email">*邮箱：</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="请输入邮箱">
            </div>
            <div class="form-group">
                <label for="password">*密码：</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="请输入6-16位密码">
            </div>
            <div class="form-group">
                <label for="password_confirm">*确认密码：</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="请确认密码">
            </div>
            <button type="submit" class="btn btn-default">注册</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(function() {
        $('#register-form').validate({
            rules: {
                nickname: {
                    required: true,
                    rangelength: [3,16]
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    rangelength: [6,16]
                },
                password_confirm: {
                    required: true,
                    equalTo: '#password'
                }
            }
        });
        var options = {
            url: '/api/admin/register',
            type: 'post',
            dataType: 'json',
            success: registerResult
        };
        $('#register-form').submit(function() {
            $(this).ajaxSubmit(options);

            return false;
        });

        function registerResult(res) {
            if (0 == res.meta.errno) {
                alert('注册成功');
            } else {
                alert(res.meta.msg);
            }
        }
    });
</script>
@endsection