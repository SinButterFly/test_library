@extends('head')

@section('content')
<h1>Категории</h1>

<h2>Добавить категорию</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="categories" method="post">
        @csrf
        <div class="form-group">
            <label for="Category">Категория</label>
            <input type="text" class="form-control" id="Category" name="category_name">
        </div>

        <input type="submit" class="form-btn_send" value="Добавить">

    </form>
</div>

<h2>Таблица категорий</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Категория</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->category_name}}</td>
                <td><a href="{{route('edit_category')}}?id={{$category->id}}">Редактировать</a></td>
                <td><a href="{{route('delete_category')}}?id={{$category->id}}">Удалить</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection