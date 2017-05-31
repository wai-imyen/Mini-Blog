@extends('index')

@section('content')

	
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-10 col-xs-12">
				<h3>{{$query->title}}</h3>
				@if(empty($query->web_path))
				<video  class="col-md-12 col-xs-12"  type="video/mp4" src="\{{$query->path}}" controls></video>
				@else
				<a href="{{$query->web_path}}">{{$query->web_path}}</a>
				@endif
				<br>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-10 col-xs-12">
				<br>
				<div class="panel panel-default">
				  <div class="panel-heading">影片說明：</div>
				  <div class="panel-body">{!! nl2br($query->content) !!}</div>
				</div>
			</div>
		</div>
	</div>
	
	



@stop