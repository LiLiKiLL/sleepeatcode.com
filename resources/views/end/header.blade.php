<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('end_index') }}">SleepEatCode</a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">博客文章管理 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('article_add') }}">写博客</a></li>
                            <li><a href="{{ route('article_list') }}">博客列表</a></li>
                            <!-- <li><a href="#">Jasper Report</a></li>
                            <li class="divider"></li>
                            <li><a href="#">分离的链接</a></li>
                            <li class="divider"></li>
                            <li><a href="#">另一个分离的链接</a></li> -->
                        </ul>
                    </li>
                </ul>
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
    </div>
</div>