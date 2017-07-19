<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')SleepEatCode</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/css/common.css" rel="stylesheet">
    @yield('css')
</head>
<body>


    <div class="container-fluid">
        @include('front.header')
        @yield('content')
        @include('front.footer')
    </div><!-- /.container -->


    <a id="back-to-top" href="javascript:void(0)" class="btn btn-primary btn-lg back-to-top" role="button" title="返回顶部" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>


    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(function() {
            // tooltip提示
            $("[data-toggle='tooltip']").tooltip();
            // 返回顶部
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
            $('#back-to-top').tooltip('show');
            // 固定底部
            function footerPosition(){
                $(".footer").removeClass("fixed-bottom");
                var contentHeight = document.body.scrollHeight,//网页正文全文高度
                    winHeight = window.innerHeight;//可视窗口高度，不包括浏览器顶部工具栏
                if(!(contentHeight > winHeight)){
                    //当网页正文高度小于可视窗口高度时，为footer添加类fixed-bottom
                    $(".footer").addClass("fixed-bottom");
                }
            }
            footerPosition();
            $(window).resize(footerPosition);
        });
    </script>
    @yield('js')
</body>
</html>