

@extends('index')

@section('content')

	<div class="col-md-10 col-md-offset-1">
		@if(Auth::check())
		<a href="{{url('article/'.$query->id.'/edit')}}" role="btn" class="btn btn-primary pull-right" id="show_btn">編輯</a>
		<form action="{{url('article/'.$query->id)}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<input type="hidden" name="_method" value="delete">
			<input type="submit" role="btn" class="btn btn-danger  pull-right" value="刪除" id="show_btn">
		</form>
		<br>
		@endif
		<h5 class="text-primary ">{{ $query->created_at }}</h5>
		
		<div class="panel panel-info">
			<div class="panel-heading title">{{ $query->title }}</div>
		  <div class="panel-body">{!! nl2br($query->content) !!}</div>
		</div>
	</div>


@stop
