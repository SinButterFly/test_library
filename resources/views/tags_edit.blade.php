@extends('head')

@section('content')
<h2>Редактировать тег</h2>
<div class="form-panel">
    <form enctype="multipart/form-data" action="{{route('edit_tag')}}" method="post">
        @csrf
        @foreach($tags as $tag)
            <div class="form-group">
                <input type="text" name="id" value="{{$tag->id}}" hidden>
                <label for="Tag">Тег</label>
                <input type="text" class="form-control" id="Tag" name="tag_name" value="{{$tag->tag_name}}">
            </div>

            <input type="submit" class="form-btn_send" value="Редактировать">
        @endforeach
    </form>
</div>
@endsection