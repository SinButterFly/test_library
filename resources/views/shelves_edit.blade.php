@extends('head')

@section('content')
<h2>Редактировать полку</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="{{route('edit_shelf')}}" method="post">
        @csrf
        @foreach($shelves as $shelf)
            <div class="form-group">
                <input type="text" name="id" value="{{$shelf->id}}" hidden>
                <label for="Shelf">Полка</label>
                <input type="text" class="form-control" id="Shelf" name="shelf_name" value="{{$shelf->shelf_name}}">
            </div>

            <input type="submit" class="form-btn_send" value="Редактировать">
        @endforeach
    </form>
</div>
@endsection