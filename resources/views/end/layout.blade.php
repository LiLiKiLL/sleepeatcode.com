<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')-sleepeatcode.com</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <!-- <div class="container-fluid"> -->
    <div class="container">
        @include('end.header')
        @include('end.alert')
        @yield('content')
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