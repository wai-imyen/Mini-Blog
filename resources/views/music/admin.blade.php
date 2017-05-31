
@extends('index')

@section('content')

<style>
	table
	  {
	  
	  border-spacing:1px;
	  }
</style>

<h2>音樂列表</h2><br>
	 
	<table class="table table-hover" >
		
		<a href="{{ url('music/create') }}" role='btn' class='btn btn-primary pull-right' >新增</a>

		@foreach ($query as $var)


		
		<tr >
			<td>{{ $var->category}}</td>
			<td style="width:350px"><a href="{{url('music/'.$var->id)}}" target="_blank">{{ $var->performer}} - {{ $var->title}}</a></td>
			<td style="width:250px">{{ $var->created_at}}</td>
			<td><a href="{{ 'https://www.youtube.com/watch?v='.$var->path}}" target="_blank">YouTube</a></td>

			<td><a href="{{url('music/'.$var->id.'/edit')}}" role="btn" class="btn btn-warning">編輯</a></td>
			<td>
				<form action="{{url('music/'.$var->id)}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<input type="hidden" name="_method" value="delete">
					<input type="submit" role="btn" class="btn btn-danger" value="刪除">
				</form>
			</td>
			
			<!-- <td><a href="{{url('music/'.$var->id.'/delete')}}" role="btn" class="btn btn-danger">刪除</a></td> -->
		</tr>
		@endforeach
	</table>

@stop