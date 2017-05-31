@extends('index')
@section('content')
<style>
	.tab-pane .create{
	margin: 15px 0;
}
</style>
<h2>影片列表</h2><br>
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#VideoCategory">影片類別</a></li>
	<li ><a data-toggle="tab" href="#Video">影片</a></li>
</ul>

<div class="tab-content">
	<div id="VideoCategory" class="tab-pane fade in active">
		<table class="table table-hover">
			
			<a href="{{ url('video_category/create') }}" role='btn' class='btn btn-primary pull-right create' >新增</a>
			
			<tr>
				<th>ID</th>
				<th>類別名稱</th>
				<th>建立時間</th>
				<th>編輯</th>
				<th>刪除</th>
			</tr>
			@foreach ($vc_query as $var)
			
			<tr>
				<td>{{ $var->id}}</td>
				<td><a href="{{url('video/'.$var->id)}}">{{ $var->name}}</a></td>
				<td>{{ $var->created_at}}</td>
				<td><a href="{{url('video_category/'.$var->id.'/edit')}}" role="btn" class="btn btn-warning">編輯</a></td>
				<td>
					<form action="{{url('video_category/'.$var->id)}}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<input type="hidden" name="_method" value="delete">
						<input type="submit" role="btn" class="btn btn-danger" value="刪除">
					</form>
				</td>
				<!-- <td><a href="{{url('article/'.$var->id.'/delete')}}" role="btn" class="btn btn-danger">刪除</a></td> -->
			</tr>
			@endforeach
		</table>
	</div>
	<div id="Video" class="tab-pane fade">
		<table class="table table-hover">
			
			<a href="{{ url('video/create') }}" role='btn' class='btn btn-primary pull-right create' >新增</a>
			<tr>
				<th>ID</th>
				<th>類別</th>
				<th>名稱</th>
				<th>建立時間</th>
				<th>編輯</th>
				<th>刪除</th>
			</tr>
			@foreach ($v_query as $var)
			
			<tr>
				<td>{{ $var->id}}</td>
				<td>{{ $var->category}}</td>
				<td><a href="{{url('video/'.$var->id)}}">{{ $var->title}}</a></td>
				<td>{{ $var->created_at}}</td>
				<td><a href="{{url('video/'.$var->id.'/edit')}}" role="btn" class="btn btn-warning">編輯</a></td>
				<td>
					<form action="{{url('video/'.$var->id)}}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<input type="hidden" name="_method" value="delete">
						<input type="submit" role="btn" class="btn btn-danger" value="刪除">
					</form>
				</td>
				<!-- <td><a href="{{url('article/'.$var->id.'/delete')}}" role="btn" class="btn btn-danger">刪除</a></td> -->
			</tr>
			@endforeach
		</table>
	</div>
</div>

@stop