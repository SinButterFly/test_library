@extends('head')

@section('content')
<h2>Редактировать категорию</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="{{route('edit_category')}}" method="post">
        @csrf
        @foreach($categories as $category)
            <div class="form-group">
                <input type="text" name="id" value="{{$category->id}}" hidden>
                <label for="Category">Категория</label>
                <input type="text" class="form-control" id="Category" name="category_name" value="{{$category->category_name}}">
            </div>

            <input type="submit" class="form-btn_send" value="Редактировать">
        @endforeach
    </form>
</div>
@endsection