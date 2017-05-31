
@extends('index')

@section('content')

<h2>Here is Music！</h2><br>


	@if(Auth::check())
	<a href="{{ url('music/create') }}" role='btn' class='btn btn-primary pull-right' >新增歌曲</a>
	@endif
	{{ $query->links() }}
	<div class="row">
		<div class="col-md-12 col-xs-12">
				<table class="table table-hover">
					
			<!-- 		<tr >
						<th>　類別</th>
						<th>歌曲</th>
						<th>建立時間</th>
						<th>影片</th>
						<th>歌詞</th>
					</tr> -->

					@foreach ($query as $var)
					

					
					<tr >
						<td>　{{ $var->category}}</td>

						<td style="width:300px">{{ $var->performer}} - {{ $var->title}}</td>
						
						<td>{{ $var->created_at}}</td>
						<td>
							<iframe width="177" height="100" src="https://www.youtube.com/embed/{{ $var->path }}" frameborder="0" allowfullscreen></iframe>
							<!-- <audio src="{{ $var->path }}" controls></audio> -->
						</td>
						<td><a href="{{url('music/'.$var->id)}}" role="btn" class="btn btn-warning" target="_blank">歌詞</a></td>

					</tr>
					@endforeach
				</table>
		</div>
	</div>
	



@stop