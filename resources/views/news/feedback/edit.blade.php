@extends('main')

@section('content')
    <h3>Изменить</h3>

    <form method="post" action="{{ route('news.feedback.update', ['feedback' => $feedback]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$feedback->name}}">
        </div>
        <div class="form-group">
            <label for="feedback">Содержание</label>
            <input type="text" name="feedback" id="feedback" class="form-control" value="{{$feedback->feedback}}">
        </div>
        <br>
        <button type="submit">Изменить</button>
    </form>

@endsection

