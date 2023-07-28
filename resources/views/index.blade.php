
@if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @extends('main')
    </div>
@endif

@section('content')
    <p>Главная страница с описанием. Какие мы хорошие!</p>
@endsection




