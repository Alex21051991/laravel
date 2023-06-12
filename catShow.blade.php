<div>
    <h2>Новости из категории № {{$idCat}}</h2>
    <p><a href="/?>"><h3>Главная</h3></a></p>
    @forelse ($catNews as $catNewsItem)
        <div>
            <p><strong><a href="{{ route('news.listNews', ['idCat' => $catNewsItem['idCat']], ['ids' => $catNewsItem['id']]) }}">{{$catNewsItem['id']}}. {{ $catNewsItem['catNews'] }}</a></strong></p>
        </div>
    @empty
        <h2>новостей нет</h2>
    @endforelse
    <div>
        <p><a href="/cat/">Back to Categories</a></p>
    </div>
</div>
