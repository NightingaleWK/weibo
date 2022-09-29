<!DOCTYPE html>
<html lang="zh_CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Weibo App') - Laravel 入门教程</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts._header')

    <div class="container">
        <div class="offset-md-1 col-md-10 mt-4">
            @include('shared._messages')
            @yield('content')
        </div>
        @include('layouts._footer')
    </div>
</body>

</html>
