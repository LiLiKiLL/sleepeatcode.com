<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('end_index') }}">SleepEatCode</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        @if(isset($nickname))
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $nickname }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin_logout') }}">退出登录</a></li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('admin_login') }}">登录</a></li>
                <li><a href="{{ route('admin_reg') }}">注册</a></li>
            </ul>
        @endif
        </div>
    </div>
</nav>