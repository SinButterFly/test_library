@extends('head')

@section('content')
<h1>Полки</h1>

<h2>Добавить полку</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="/shelves" method="post">
        @csrf
        <div class="form-group">
            <label for="Shelf">Полка</label>
            <input type="text" class="form-control" id="Shelf" name="shelf_name">
        </div>

        <input type="submit" class="form-btn_send" value="Добавить">

    </form>
</div>

<h2>Таблица полок</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Полка</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shelves as $shelf)
            <tr>
                <td>{{$shelf->shelf_name}}</td>
                <td><a href="{{route('edit_shelf')}}?id={{$shelf->id}}">Редактировать</a></td>
                <td><a href="{{route('delete_shelf')}}?id={{$shelf->id}}">Удалить</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection