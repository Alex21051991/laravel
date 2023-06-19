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

@section('feedback')
    <div style="border: 1px solid #4f4f47;">
        <h3>Форма обратной связи</h3>
        <form action="" method="post">
            @csrf
            <p>Имя: <input name="name" placeholder="Введите Ваше имя"></p>
            <p>Комментарий: <textarea name="inform" placeholder="Информация"></textarea></p>
            <button type="submit">Отправить</button>
        </form>
    </div>
@endsection


@section('uploadOrder')
    <div style="border: 1px solid #285b79;">
        <h3>Форма заказа на получение выгрузки</h3>
        <form action="" method="post">
            @csrf
            <p>Имя: <input name="name" placeholder="Введите Ваше имя"></p>
            <p>Телефон: <input name="phone" placeholder="+7(___)___-__-__"></p>
            <p>e-mail: <input name="email" placeholder="***@***.ru"></p>
            <p>Хачу: <textarea name="inform" placeholder="Информация"></textarea></p>
            <button type="submit">Отправить</button>
        </form>
    </div>
@endsection



