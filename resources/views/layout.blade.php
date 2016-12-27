<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        @yield('header')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @yield('footer')
    </body>
</html>
