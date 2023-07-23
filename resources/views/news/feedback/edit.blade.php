@extends('main')

@section('content')
    <h3>Изменить</h3>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('news.feedback.update', ['feedback' => $feedback]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$feedback->name}}">
            @error('name') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="feedback">Содержание</label>
            <input type="text" name="feedback" id="feedback" class="form-control" value="{{$feedback->feedback}}">
            @error('feedback') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <br>
        <button type="submit">Изменить</button>
    </form>

@endsection

