@extends('learn3.main')

@section('title')
    @parent
@endsection


@section('content')
    <h3>Новости</h3>
    <!--@dump($news)-->
    @forelse($news as $item)
        <h4>{{$item['title']}}</h4>
        <div>{{$item['inform']}}</div>

        @if (!$item['isPrivate'])
            <a href="{{route('learn3.news', $item['id'])}}">Подробнее...</a>
        @endif
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection

@section('categ')
    <h3>Категории</h3>
    @forelse($categ as $item)
        <p><strong><a href="{{route('learn3.news',['par' => 'newsCat'])}}">{{$item['idCat']}}. {{$item['category'] }}</a></strong></p>
        <hr>
    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection

@section('newsCat')
    <h2>Новость подробно</h2>
    <div>
        <p><strong>{{$listNews}}</strong></p>
    </div>
@endsection




