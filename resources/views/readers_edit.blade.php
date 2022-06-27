@extends('head')

@section('content')
<h2>Редактировать читателя</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="{{route('edit_reader')}}" method="post">
        @csrf
        @foreach($readers as $reader)
            <div class="form-group">
                <input type="text" name="id" value="{{$reader->id}}" hidden>
                <label for="Date_reg">Дата регистрации</label>
                <input type="date" class="form-control" id="Date_reg" name="date_reg" value="{{$reader->date_reg}}">
            </div>
            <div class="form-group">
                <label for="Reader">Читатель</label>
                <input type="text" class="form-control" id="Reader" name="reader_name" value="{{$reader->reader_name}}">
            </div>
            <div class="form-group">
                <label for="Date_born">Дата рождения</label>
                <input type="date" class="form-control" id="Date_born" name="date_born" value="{{$reader->date_born}}">
            </div>

            <div class="form-group">
            <label for="Book">Книга</label>
            <select class="form-control" name="book_id" id="Book">
                @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->book_name}}</option>
                @endforeach
            </select>
        </div>

            <input type="submit" class="form-btn_send" value="Редактировать">
        @endforeach
    </form>
</div>
@endsection