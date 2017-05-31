@extends('index')

@section('content')

<h2>編輯歌曲</h2><br>

<form action="{{url('music/'.$query->id)}}" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="hidden" name="_method" value="PUT">

	<label for="performer">演出者：</label>
	<input type="text" name="performer" class="form-control" value="{{$query->performer}}">

	<label for="title">歌曲:</label>
	<input type="text" name="title" class="form-control" value="{{$query->title}}">

	<label for="path">路徑	：</label>
	<input type="text" name="path" class="form-control" value="{{$query->path}}">

	<label for="category"　id="category">類別：</label>
	<label class="radio-inline"><input type="radio" name="category" value="西洋" <?php echo($query->category === "西洋") ? "checked" : "" ;?>>西洋</label>
	<label class="radio-inline"><input type="radio" name="category" value="華語" <?php echo($query->category === "華語") ? "checked" : "" ;?>>華語</label>
	<label class="radio-inline"><input type="radio" name="category" value="其他" <?php echo($query->category === "其他") ? "checked" : "" ;?>>其他</label>
	<br>

	<label for="lyrics">歌詞:</label>
	<textarea name="lyrics" id="" cols="30" rows="16" class="form-control" >{{$query->lyrics}}</textarea>
	<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
</form>



@stop