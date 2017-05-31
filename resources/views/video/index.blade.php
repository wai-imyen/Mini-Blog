@extends('index')

@section('content')
<div class="container">
	<h2>Here is Video！</h2>
	@if(Auth::check())
	<a href="{{ url('video/create') }}" role='btn' class='btn btn-primary pull-right' id="show_btn">新增影片</a>
	<a href="{{ url('video_category/create') }}" role='btn' class='btn btn-primary pull-right' >新增類別</a>
	@endif
	<br><br>
	<div class="row">
		@foreach($query as $var)
		<div class="col-md-4">

			<a href="{{url('video/'.$var->id)}}" class="thumbnail">
				<img src="{{$var->pic}}" alt="{{$var->name}}" class="img-thumbnail" id="video_category_img">
				<h4 style="text-align:center;">{{$var->name}}</h4>
			</a>
		</div>
		@endforeach
	</div>	
</div>



@stop