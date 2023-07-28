@extends('main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
                <a href="{{ route('news.news.create', ['param' => 'createHtml']) }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость из HTML</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">

        @include('news.message')

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

            @foreach($news as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->id_category}}</td>
                    <td>{{$item->id_users}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->isprivate}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->actions}}</td>
                    @if(Auth::user()->isAdmin)
                        <td><a href="{{ route('news.news.edit', ['news' => $item]) }}">Edit</a>&nbsp;
                            <a href="javascript:" style="color:red" class="delete" rel="{{$item->id}}">Delete</a>
                        </td>
                    @endif
                </tr>
        @endforeach


    </div>
    {{ $news->links() }}
@endsection

@push('js')
    <script type="text/javascript">
        //проверяем загрузку DOM
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll('.delete');
            elements.forEach(function (element, key){
                element.addEventListener('click', function () {
                    const id = this.getAttribute('rel');
                    if(confirm(`Подтвердите удаление записи с #ID = ${id}`)) {
                        send(`/news/news/${id}`).then( () => {
                            location.reload();
                        });
                    } else {
                        alert("Отмена удаления записи");
                    }
                });
            })
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
