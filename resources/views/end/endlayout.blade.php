<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')-sleepeatcode.com</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- <div class="container-fluid"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('host') }}">SleepEatCode</a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('admin_reg') }}">注册</a></li>
                            <li><a href="{{ route('admin_login') }}">登录</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    书签管理 <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">jmeter</a></li>
                                    <li><a href="#">EJB</a></li>
                                    <li><a href="#">Jasper Report</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">分离的链接</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">另一个分离的链接</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>