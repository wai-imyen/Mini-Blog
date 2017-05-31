

@extends('index')

@section('content')

<style>
	.panel-heading{

		height: 50px;
		color: blue;
	}
	body{

		font-family:"微軟正黑體",sans-serif;
		font-size: 11pt;
	}
</style>
<?php 
	$count;


?>
<h2>Here is BLOG !</h2><br>

<div class="row">

	
	<div class="col-md-3 ">
		<br>
		<h4>我最近的文章</h4><br>
		@foreach ($recent_data as $var)
			
			<a href="{{url('article/'.$var->id)}}"><li style="list-style-type:square">{{ $var->title }}</li></a><br>
			
		@endforeach	
		
	</div>
	
	
		<div class="col-md-8 col-xs-12  articleIndex">
	@if( Auth::check() )
		<a href="{{ url('article/create') }}" role='btn' class='btn btn-info pull-right' >新增文章</a><br>
	@endif


	@foreach ($query as $var)

		<?php $content = mb_substr($var->content,0,100,"UTF-8");?>
		
		<h5 class=" ">{{ $var->created_at }}</h5>
		<div class="panel panel-default">
			<div class="panel-heading articleIndexTitle" >{{ $var->title}}</div>
			<div class="panel-body">{!! nl2br($content) !!} ...
				<br>
				<a href="{{url('article/'.$var->id)}}" id="read" class="pull-right">繼續閱讀...</a>
			</div>
			</div>
			<br>
	@endforeach	
	<center>
	{{ $query->links() }}
	</center>
	<br><br><br>

	</div>
	
</div>
	

@stop


