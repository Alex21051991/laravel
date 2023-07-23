@extends('auth.register')

{{--@extends('main')

@section('content')
    <div style="border: 2px solid #4f4f47;">

        <h3>Новый Клиент</h3>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('news.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Введите Ваше имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                @error('name') <strong style="color:red;">{{$message}}</strong> @enderror()
            </div>
            <div class="form-group">
                <label for="email">e-mail:</label>
                <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                @error('emai') <strong style="color:red;">{{$message}}</strong> @enderror()
            </div>
            <div class="form-group">
                <label for="password">Телефон</label>
                <input type="text" name="password" id="password" class="form-control" value="{{old('password')}}">
                @error('password') <strong style="color:red;">{{$message}}</strong> @enderror()
            </div>
            <div class="form-group">
                <label for="isAdmin">Сообщение</label>
                <input type="text" name="isAdmin" id="isAdmin" class="form-control" value="{{old('isAdmin')}}">
                @error('isAdmin') <strong style="color:red;">{{$message}}</strong> @enderror()
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>
@endsection--}}

