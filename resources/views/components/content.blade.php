<div>
    @forelse ($category as $categoryItem)
        <div>
            <p><strong><a href="{{ route('news.catShow', ['idCat' => $categoryItem['idCat']])}}">{{$categoryItem['idCat']}}. {{$categoryItem['category'] }}</a></strong></p>
        </div>
    @empty
        <h2>Категорий новостей нет</h2>
    @endforelse
</div>
