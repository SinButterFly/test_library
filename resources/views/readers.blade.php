@extends('head')

@section('content')
<h1>Читатели</h1>

<h2>Добавить читетеля</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="readers" method="post">
        @csrf
        <div class="form-group">
            <label for="Date_reg">Дата регистрации</label>
            <input type="date" class="form-control" id="Date_reg" name="date_reg">
        </div>
        <div class="form-group">
            <label for="Reader_name">ФИО</label>
            <input type="text" class="form-control" id="Reader_name" name="reader_name">
        </div>
        <div class="form-group">
            <label for="Date_born">Дата рождения</label>
            <input type="date" class="form-control" id="Date_born" name="date_born">
        </div>

        <div class="form-group">
            <label for="Book">Книга</label>
            <select class="form-control" name="book_id" id="Book">
                @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->book_name}}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" class="form-btn_send" value="Добавить">

    </form>
</div>

<h2>Таблица читателей</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Дата регистрации</th>
                <th>ФИО</th>
                <th>Дата рождения</th>
                <th>Книга</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($readers as $reader)
            <tr>
                <td>{{$reader->date_reg}}</td>
                <td>{{$reader->reader_name}}</td>
                <td>{{$reader->date_born}}</td>
                <td>{{$reader->book['book_name']}}</td>
                <td><a href="{{route('edit_reader')}}?id={{$reader->id}}">Редактировать</a></td>
                <td><a href="{{route('delete_reader')}}?id={{$reader->id}}">Удалить</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection