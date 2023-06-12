<div>
    <h2>Категории новостей</h2>
    <p><a href="/?>"><h3>Главная</h3></a></p>
    @forelse ($category as $categoryItem)
        <div>
            <p><strong><a href="{{ route('news.catShow', ['idCat' => $categoryItem['idCat']])}}">{{$categoryItem['idCat']}}. {{$categoryItem['category'] }}</a></strong></p>
        </div>
    @empty
    <h2>Категорий новостей нет</h2>
    @endforelse
</div>

