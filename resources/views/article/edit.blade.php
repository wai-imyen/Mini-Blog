@extends('index')

@section('content')

<h2>編輯文章</h2><br>

<form action="{{url('article/'.$query->id)}}" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="hidden" name="_method" value="PUT">
	<label for="title">標題:</label>
	<input type="text" name="title" class="form-control" value="{{$query->title}}">
	<label for="content">內容:</label>
	<textarea name="content" id="" cols="30" rows="16" class="form-control" >{{$query->content}}</textarea>
	<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
</form>


@stop