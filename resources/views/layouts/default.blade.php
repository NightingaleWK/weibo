<!DOCTYPE html>
<html>

<head>
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
