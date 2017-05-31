

@extends('index')

@section('content')


	<h2>文章列表</h2><br>
	 
	<table class="table table-hover">
		
		<a href="{{ url('article/create') }}" role='btn' class='btn btn-primary pull-right' >新增</a>

		@foreach ($query as $var)
		
		<tr>
			<td>{{ $var->id}}</td>
			<td><a href="{{url('article/'.$var->id)}}">{{ $var->title}}</a></td>
			<td>{{ $var->created_at}}</td>
			<td><a href="{{url('article/'.$var->id.'/edit')}}" role="btn" class="btn btn-warning">編輯</a></td>
			<td>
				<form action="{{url('article/'.$var->id)}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<input type="hidden" name="_method" value="delete">
					<input type="submit" role="btn" class="btn btn-danger" value="刪除">
				</form>
			</td>
			<!-- <td><a href="{{url('article/'.$var->id.'/delete')}}" role="btn" class="btn btn-danger">刪除</a></td> -->
		</tr>
		@endforeach
	</table>


@stop


