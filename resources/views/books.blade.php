@extends('head')

@section('content')
<h1>Книги</h1>

<h2>Добавить Книгу</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="books" method="post">
        @csrf
        <div class="form-group">
            <label for="Book_name">Книга</label>
            <input type="text" class="form-control" id="Book_name" name="book_name">
        </div>
        <div class="form-group">
            <label for="Author">Автор</label>
            <input type="text" class="form-control" id="Author" name="author">
        </div>
        <div class="form-group">
            <label for="Photo">Фотография</label>
            <input type="file" class="form-control" id="Photo" name="photo">
        </div>
        <div class="form-group">
            <label for="Shelf_book">Полка</label>
            <select class="form-control" name="shelf_id" id="Shelf_book">
                @foreach($shelves as $shelf)
                    <option value="{{$shelf->id}}">{{$shelf->shelf_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Category_book">Категория</label>
            <select class="form-control" name="category_id" id="Category_book">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Tag_book">Теги</label>
            <select class="form-control" name="tag_id" id="Tag_book">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" class="form-btn_send" value="Добавить">

    </form>
</div>

<h2>Таблица категорий</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Книга</th>
                <th>Автор</th>
                <th>Полка</th>
                <th>Категория</th>
                <th>Тег</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->book_name}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->shelf['shelf_name']}}</td>
                <td>{{$book->category['category_name']}}</td>
                <td>{{$book->tag['tag_name']}}</td>

                <td><a href="{{route('edit_book')}}?id={{$book->id}}">Редактировать</a></td>
                <td><a href="{{route('delete_book')}}?id={{$book->id}}">Удалить</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection