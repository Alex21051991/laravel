@extends('main')

@section('content')
    <h2 class="h2">Парсер новостей</h2>
    <div>
        @include('news.message')
        <table class="tables">
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



<style>
    .tables {
        width: 100%;
        margin-bottom: 20px;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }
    .tables th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }
    .tables td {
        border: 1px solid #dddddd;
        padding: 5px;
    }
</style>
