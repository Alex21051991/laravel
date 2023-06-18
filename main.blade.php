<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <x-news.header/>
    <title>@section('title') Страница @show</title>
</head>
    <body>
        <x-news.menu/>

        @if (!isset($_GET['par']))
            <p>Главная страница с описанием. Какие мы хорошие!</p>
        @else
            <div class="content">
                @yield($_GET['par'])
            </div>
        @endif

        <x-news.footer/>
    </body>
</html>
