<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') 吃饭睡觉写代码-Dashboard</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    @include('end.header')
    @include('end.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                @include('end.sidebar')
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/jquery.validate.messages_cn.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                type: "post",
                dataType: "json"
            });
        });
    </script>
    @yield('js')
</body>
</html>