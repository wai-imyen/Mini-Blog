@extends('index')

@section('content')

<h2>編輯影片</h2><br>

<form action="{{url('video/'.$query->id)}}" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="hidden" name="_method" value="PUT">
	<label for="category">類別:</label>

	<select name="category" id="category" class="form-control">
		@foreach($query_ca as $var)
		<option value="{{$var->name}}" <?php echo($query->category === $var->name) ? "selected" : "" ;?>>{{$var->name}}</option>
		@endforeach
	</select>

	<label for="title">標題:</label>
	<input type="text" name="title" class="form-control" value="{{$query->title}}">

	<label for="path">本機來源:</label>
	<input type="text" name="path" class="form-control" value="{{$query->path}}">
	<label for="web_path">網路來源:</label>
	<input type="text" name="web_path" class="form-control" value="{{$query->web_path}}">
	<label for="others">備註:</label>
	<input type="text" name="others" class="form-control" value="{{$query->others}}">
	<label for="content">內容:</label>
	<textarea name="content" id="" cols="30" rows="17" class="form-control">{{$query->content}}</textarea>
	<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
</form>


@stop