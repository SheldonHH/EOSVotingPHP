<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app">
        <Myheader>
        </Myheader>
        <div class="container">
            <router-view></router-view>
            {{--<Add></Add>--}}
        </div>
        <Myfooter>
        </Myfooter>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>