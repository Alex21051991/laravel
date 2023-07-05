@extends('main')

@section('content')
    <div style="border: 2px solid #4f4f47;">

        <h3>Новый заказ</h3>

        <form method="post" action="{{ route('news.order_info.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Введите Ваше имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
            </div>

            <div class="form-group">
                <label for="email">e-mail:</label>
                <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="info">Сообщение</label>
                <input type="text" name="info" id="info" class="form-control" value="{{old('info')}}">
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>
@endsection

