@extends('index')

@section('content')

<h2>新增影片</h2><br>

<form action="{{url('video')}}" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<label for="category">類別:</label>
	<select name="category" id="category" class="form-control">
		@foreach($query as $var)
		<option value="{{$var->name}}">{{$var->name}}</option>
		@endforeach
	</select>
	
	<label for="title">標題:</label>
	<input type="text" name="title" class="form-control">

	<label for="path">本機來源:</label>
	<input type="text" name="path" class="form-control">
	<label for="web_path">網路來源:</label>
	<input type="text" name="web_path" class="form-control">
	<label for="others">備註:</label>
	<input type="text" name="others" class="form-control">
	<label for="content">內容:</label>
	<textarea name="content" id="" cols="30" rows="17" class="form-control"></textarea>
	<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
</form>


@stop