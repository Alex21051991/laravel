@extends('main')

@section('content')
    <h3>Изменить</h3>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('news.users.update', ['users' => $users]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}">
            @error('name') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="email">Телефон</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$users->email}}">
            @error('emai') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="text" name="password" id="password" class="form-control" value="{{$users->password}}">
            @error('password') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="isAdmin">Админ?</label>
            <input type="checkbox" name="isAdmin" id="isAdmin" class="form-control" value="{{$users->isAdmin}}">
            @error('isAdmin') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <br>
        <button type="submit">Изменить</button>
    </form>

@endsection



