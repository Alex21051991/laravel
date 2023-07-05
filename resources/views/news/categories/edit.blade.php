@extends('main')

@section('content')
    <h3>Изменение категории</h3>
    <form method="post" action="{{ route('news.categories.update', ['categories' => $categories]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$categories->title}}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" name="description" id="description" class="form-control" value="{{$categories->description}}">
        </div>

        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>

        <br>
        <button type="submit">Изменить категорию</button>
    </form>
@endsection

