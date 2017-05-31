@extends('index')

@section('content')

<h2>新增歌曲</h2><br>
<div class="row">

	<div class="col-md-10 col-md-offset-1">
		<form action="{{url('music')}}" method='post'>
			<input type="hidden" name="_token" value="{{ csrf_token()}}">

			<label for="performer">演出者：</label>
			<input type="text" name="performer" class="form-control">

			<label for="title">歌曲：</label>
			<input type="text" name="title" class="form-control">
			
			<label for="path">路徑	：</label>
			<input type="text" name="path" class="form-control">

			<label for="category"　id="category">類別：</label>
			<label class="radio-inline"><input type="radio" name="category" value="西洋" checked>西洋</label>
			<label class="radio-inline"><input type="radio" name="category" value="華語">華語</label>
			<label class="radio-inline"><input type="radio" name="category" value="其他">其他</label>
			<br>

			<label for="lyrics">歌詞：</label>
			<textarea name="lyrics" id="" cols="30" rows="17" class="form-control"></textarea>


			<input type="submit" class="btn btn-primary pull-right" id="submit" value='送出'>
		</form>
	</div>
</div>



@stop