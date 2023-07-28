@extends('main')

@section('content')
    <h2 class="h2">Парсер новостей</h2>
    <div>
        @include('news.message')
        <table>
            <tr>
                <th>Ключ</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Автор</th>
                <th>Дата публикации</th>
                <th>Ссылка</th>
                <th></th>
            </tr>

            @foreach($parser as $key => $item)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$item['category']}}</td>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['description']}}</td>
                    <td>{{$item['author']}}</td>
                    <td>{{$item['pubDate']}}</td>
                    <td><a href={{ $item['link'] }}>Подробнее</a></td>
                    @if(Auth::user()->isAdmin)
                        <td>
                            <a href="{{route('news.parser.edit', [$key, 'title' => $item['title'], 'category' => $item['category'], 'description' => $item['description'], 'author' => $item['author'], 'pubDate' => $item['pubDate'], 'link' => $item['link']])}}">
                                Save
                            </a>
                        </td>
                    @endif

                </tr>
            @endforeach
        </table>
    </div>
@endsection
