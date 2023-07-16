@extends('main')

@section('content')
    <h3>Добавление категории</h3>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('news.categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="categories">Категории</label>
            <select class="form-control" multiple name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{$category->title}}</option>
                @endforeach
            </select>
            @error('categories') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
            @error('title') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" name="description" id="description" class="form-control" value="{{old('description')}}">
            @error('description') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>

        <div class="form-group">
            <label for="actions">Статус</label>
            <select class="form-control" name="actions" id="actions">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
            @error('status') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>

        <br>
        <button type="submit">Добавить категорию</button>
    </form>
@endsection


