@extends('main')

@section('content')
    <div style="border: 2px solid #4f4f47;">

        <h3>Новое сообщение к обратной связи</h3>

        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('news.feedback.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Введите Ваше имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                @error('name') <strong style="color:red;">{{$message}}</strong> @enderror()
            </div>
            <div class="form-group">
                <label for="feedback">Сообщение</label>
                <input type="text" name="feedback" id="feedback" class="form-control" value="{{old('feedback')}}">
                @error('feedback') <strong style="color:red;">{{$message}}</strong> @enderror()
            </div>

            <button type="submit">Отправить</button>
        </form>

    </div>
@endsection
