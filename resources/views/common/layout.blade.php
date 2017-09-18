<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')SleepEatCode</title>
    <meta name="author" content="陈旭">
    <meta name="description" content="陈旭的个人博客，PHP开发，做一个靠谱的人。Someone who loves to program and enjoys being clever about it.">

    <!-- Facebook OGP -->
    <meta property="og:image" content="/images/portrait.gif">
    <meta property="og:description" content="陈旭的个人博客">
    <meta property="og:title" content="SleepEatCode">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/common.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    @yield('css')
</head>
<body>
@yield('content')
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
        $('.nav').height($(document).height());
    });
</script>
@yield('js')
</body>
</html>
