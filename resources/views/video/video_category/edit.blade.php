@extends('index')

@section('content')

<h2>編輯影片類別</h2><br>

<form action="{{url('video_category/'.$query->id)}}" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="hidden" name="_method" value="PUT">
	<label for="name">類別名稱:</label>
	<input type="text" name="name" class="form-control" value="{{$query->name}}">
	<label for="pic">圖片位置:</label>
	<input type="text" name="pic" class="form-control" value="{{$query->pic}}">
	<label for="content">內容:</label>
	<textarea name="content" id="" cols="30" rows="17" class="form-control">{{$query->content}}</textarea>
	<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
</form>


@stop