<?php
//dump($listNews{{"categories"}});
?>

@section('catNews')
    <hr>
    <h3>Новости Категории №  {{$id}} - {{$catNewsName}}</h3>
    <hr>
    @forelse($listNews as $item)
        @if (!$item->isprivate)
            <a href="{{route('learn3.newsOne', $item->id)}}">{{$item->title}}</a>
        @else
            <h4>{{$item->title}}</h4>
        @endif
        <p><i>Автор:</i><b> {{$item->login}}</b>; &nbsp;&nbsp;&nbsp;<i>Источник:</i> <b>{{$item->source}}</b></p>
        <hr>
    @empty
        <p>Нет новостей в этой категорий</p>
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
        @yield('catNews')
    </div>

    <x-news.footer/>
</body>
</html>
