<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <x-.header/>
    <title>@section('title') Страница @show</title>
</head>
    <body>
        <x-.menu/>

            <div class="content">
                @yield('content')
            </div>

        <x-.footer/>
    </body>
</html>
