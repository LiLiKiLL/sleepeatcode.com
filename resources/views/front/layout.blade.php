<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')SleepEatCode</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/common.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div class="container-fluid">
        @include('front.header')
        @yield('content')
        @include('front.footer')
    </div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@yield('js')
<script>
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
</body>
</html>