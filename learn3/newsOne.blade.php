@section('newsOne')
    @forelse($newsOne as $item)
        <p><b>{{$item->inform}}</b></p>
        <hr>
    @empty
        <p>Нет новости</p>
    @endforelse
@endsection

<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <x-news.header/>
    <title>@section('title') Страница @show</title>
</head>
<body>
    <x-news.menu/>

    <div class="content">
        @yield('newsOne')
    </div>

    <x-news.footer/>
</body>
</html>
