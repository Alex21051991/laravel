@extends('main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
                <th>Date create</th>
                <th>Date update</th>
                <th></th>
            </tr>
            @forelse($categoryList as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->actions}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{ route('news.categories.edit', ['categories' => $item]) }}">Edit</a>
                        <a href="{{ route('news.categories.destroy', ['categories' => $item]) }}">Delete</a></td>
                </tr>
            @empty
                <p>Нет </p>
            @endforelse
        </table>
    </div>
@endsection

