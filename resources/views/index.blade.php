@extends('head')

@section('content')

<h2>Книги</h2>
<div class="row">
    @foreach($books as $book)
        <div class="col-4">
            <div>
                <img style="max-height: 150px;" src="{{$book->photo}}" alt="book">
            </div>
            <div>
                <h5>{{$book->book_name}}</h5>
                <p>{{$book->author}}</p>
                <p><small>Полка: {{$book->shelf['shelf_name']}}</small></p>
                <p><small>Категория: {{$book->category['category_name']}}</small></p>
                <p><small>Тег: {{$book->tag['tag_name']}}</small></p>
            </div>
        </div>
    @endforeach
</div>
@endsection