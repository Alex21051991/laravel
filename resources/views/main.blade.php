<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">

    <x-header/>
    <title>@section('title') Страница @show</title>
</head>
    <body>
        <x-menu/>

            <div class="content tables">
                @yield('content')
            </div>

        <x-footer/>
        @stack('js')
    </body>
</html>
