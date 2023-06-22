<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <x-news.header/>
    <title>@section('title') Страница @show</title>
</head>
    <body>
        <x-news.menu/>
        <p>Главная страница с описанием. Какие мы хорошие!</p>

        @if (!isset($_GET['par']))

        @else
            <div class="content">
                @yield($_GET['par'])
            </div>
        @endif

        <x-news.footer/>
    </body>
</html>
