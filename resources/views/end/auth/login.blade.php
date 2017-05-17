<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理员注册</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/api/admin/login" role="form" method="post">
                    <div class="form-group">
                        <label for="nickname">用户名：</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                    </div>
                    <button type="submit" class="btn btn-default">登录</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>