@extends('main')

@section('content')
    <h3>Редактировать новость</h3>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('news.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="categories">Категории</label>
            <select class="form-control" multiple name="categories[]" id="categories">
                @foreach($categories as $category)

                    <option {{--@if(in_array($category->id, $news->$categories->pluck('id')->toArray() )) selected @endif--}} value="{{ $category->id }}">
                        {{$category->title}}
                    </option>

                @endforeach
            </select>
            @error('categories') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
            @error('title') <x-alert type="danger" :message="$message"></x-alert> @enderror()
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $news->author }}">
            @error('author') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if($news->status === 'draft') selected @endif value="{{\App\Enums\NewsStatus::DRAFT->value}}">DRAFT</option>
                <option @if($news->status === 'active') selected @endif value="{{\App\Enums\NewsStatus::ACTIVE->value}}">ACTIVE</option>
                <option @if($news->status === 'blocked') selected @endif value="{{\App\Enums\NewsStatus::BLOCKED->value}}">BLOCKED</option>
            </select>
            @error('status') <strong style="color:red;">{{$message}}</strong> @enderror()
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div>

        <br>
        <button type="submit">Сохранить новость</button>
    </form>

@endsection

