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

        @include('news.message')

        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Сообщение</th>
                <th>Date create</th>
                <th>Date update</th>
                <th></th>
            </tr>

            @foreach($feedback as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->feedback}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{ route('news.feedback.edit', ['feedback' => $item]) }}">Edit</a>
                        <a href="javascript:" style="color:red" class="delete" rel="{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
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
                        send(`/news/feedback/${id}`).then( () => {
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
