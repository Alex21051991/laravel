@extends('main')

@section('content')
    <h3>Изменить</h3>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('news.order_info.update', ['order_info' => $order_info]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$order_info->name}}">
            @error('name') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{$order_info->phone}}">
            @error('phone') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="email">Телефон</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$order_info->email}}">
            @error('emai') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="info">Содержание</label>
            <input type="text" name="info" id="info" class="form-control" value="{{$order_info->info}}">
            @error('info') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <br>
        <button type="submit">Изменить</button>
    </form>

@endsection



