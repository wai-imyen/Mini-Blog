@extends('index')

@section('content')

<h2>新增文章</h2><br>

<form action="{{url('article')}}" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<label for="title">標題:</label>
	<input type="text" name="title" class="form-control">
	<label for="content">內容:</label>
	<textarea name="content" id="" cols="30" rows="17" class="form-control"></textarea>
	<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
</form>


@stop