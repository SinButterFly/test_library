@extends('head')

@section('content')

<h2>Редактировать книгу</h2>
<form enctype="multipart/form-data" class="form-panel" action="{{route('edit_book')}}" method="post">
    @csrf
    @foreach($books as $book)
        <div class="form-group">
            <input type="text" name="id" value="{{$book->id}}" hidden>
            <label for="Book">Книга</label>
            <input type="text" class="form-control" id="Book" name="book_name" value="{{$book->book_name}}">
        </div>

        <div class="form-group">
            <label for="Author">Автор</label>
            <input type="text" class="form-control" id="Author" name="author" value="{{$book->author}}">
        </div>

        <div class="form-group">
            <label for="Photo">Фотография</label>
            <input type="file" class="form-control-file" id="Photo" name="photo" value="{{$book->photo}}">
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
            <label for="Teg_book">Тег</label>
            <select class="form-control" name="tag_id" id="Teg_book">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" class="form-btn_send" value="Редактировать">
    @endforeach
</form>

@endsection