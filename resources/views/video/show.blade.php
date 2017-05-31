@extends('index')

@section('content')

<h2>{{$query->name}}</h2>

<br>	
<div class="container video">
	
	<div class="row">
		<div class="col-md-6">
			@if(Auth::check())
			<a href="{{url('video_category/'.$query->id.'/edit')}}" role="btn" class="btn btn-warning pull-left" id="show_btn">編輯類別</a>
			<!-- <a href="{{url('video_category/'.$query->id.'/edit')}}" role="btn" class="btn btn-danger pull-left" id="show_btn">刪除類別</a> -->
			@endif
			<img src="{{$query->pic}}" alt="{{$query->pic}}" class="col-xs-12" id="video_ca_pic">
			<p>　</p>
			<p id="vc_content">說明： {{$query->content}}</p>
		</div>
		
		<div class="col-md-6">
			@if(Auth::check())
			<a href="{{ url('video/create') }}" role='btn' class='btn btn-info pull-right' id="show_btn">新增影片</a>
			<br><br>
			@endif
			<table class="table table-hover" id="table_video">
				<tr>
					<th>標題</th>
					<th>建立時間</th>
					<th>內容</th>
				</tr>
				
				
				@foreach($query_video as $var)
				<tr>
					<td>{{$var->title}}</td>
					<td>{{$var->created_at}}</td>
	
					<td><a href="{{url('video/resource/'.$var->id.'/'.$var->title)}}" role="btn" class="btn btn-warning">查看</a></td>

				</tr>
				@endforeach
				
						
			
			<!-- <video src="/{{$var->path}}" controls></video> -->
			</table>
		</div>
	</div>
</div>







@stop