@extends('main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Форма заказа</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.order_info.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>email</th>
                <th>info</th>
                <th>Date create</th>
                <th>Date update</th>
                <th></th>
            </tr>

            @forelse($order_info as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->info}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{ route('news.order_info.edit', ['order_info' => $item]) }}">Edit</a> <a href="#">Delete</a></td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection





