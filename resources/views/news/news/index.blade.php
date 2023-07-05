@extends('main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Categories</th>
                <th>Author</th>
                <th>Title</th>
                <th>Status</th>
                <th>Date create</th>
                <th>Actions</th>
                <th></th>
            </tr>

            @forelse($news as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->id_category}}</td>
                    <td>{{$item->id_users}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->isprivate}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->actions}}</td>
                    <td><a href="{{ route('news.news.edit', ['news' => $item]) }}">Edit</a>
                        <a href="{{ route('news.news.destroy', ['news' => $item]) }}">Delete</a></td>
                </tr>
            @empty
                <p>Нет новостей</p>
        @endforelse


    </div>
    {{ $news->links() }}
@endsection

