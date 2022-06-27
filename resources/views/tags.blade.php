@extends('head')

@section('content')
<h1>Теги</h1>

<h2>Добавить тег</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="tags" method="post">
        @csrf
        <div class="form-group">
            <label for="Tag">Тег</label>
            <input type="text" class="form-control" id="Tag" name="tag_name">
        </div>

        <input type="submit" class="form-btn_send" value="Добавить">

    </form>
</div>

<h2>Таблица тегов</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Тег</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{$tag->tag_name}}</td>
                <td><a href="{{route('edit_tag')}}?id={{$tag->id}}">Редактировать</a></td>
                <td><a href="{{route('delete_tag')}}?id={{$tag->id}}">Удалить</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection