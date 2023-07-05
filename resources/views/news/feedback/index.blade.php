@extends('main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Форма обратной связи</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.feedback.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Сообщение</th>
                <th>Date create</th>
                <th>Date update</th>
                <th></th>
            </tr>

            @forelse($feedback as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->feedback}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{ route('news.feedback.edit', ['feedback' => $item]) }}">Edit</a> <a href="#">Delete</a></td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection
