<?php 
if (isset($title)==false) {
	$title="Here Is Yen！";
}

?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{{url('')}}" style="color:white;">HereIsYen</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="{{Request::is('article*') ? 'active':'' }}"><a href="{{url('article')}}">Blog</a></li>
	      <li class="{{Request::is('music*') ? 'active':'' }}"><a href="{{url('music')}}">Music</a></li>
	      <li class="{{Request::is('video*') ? 'active':'' }}"><a href="{{url('video')}}">Video</a></li>

	      @if(Auth::check())
	      <li class="dropdown {{Request::is('articleAdmin') ? 'active':'' }} {{Request::is('article/create') ? 'active':'' }} {{Request::is('article/*/edit') ? 'active':'' }}
	      {{Request::is('musicAdmin' ) ? 'active':'' }} {{Request::is('music/*/edit') ? 'active':'' }} {{Request::is('music/create') ? 'active':'' }}
	      {{Request::is('videoAdmin') ? 'active':'' }} {{Request::is('video/create') ? 'active':'' }} {{Request::is('video/*/edit') ? 'active':'' }}
	     {{Request::is('video_category/create') ? 'active':'' }} {{Request::is('video_category/*/edit') ? 'active':'' }} "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="{{url('articleAdmin')}}">Blog Admin</a></li>
	          <li><a href="{{url('musicAdmin')}}">Music Admin</a></li>
	         <li><a href="{{url('videoAdmin')}}">Video Admin</a></li>
	        </ul>
	      </li>
	      @endif
	    </ul>
	    <div class="top">
		    <ul class="nav navbar-nav navbar-right">
		    	@if (Auth::guest())
		      <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		      	@else
		      	<li><a href="{{ url('/logout') }}" 
		      		onclick="event.preventDefault();
		      		         document.getElementById('logout-form').submit();">
		      		         <span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		      	    {{ csrf_field() }}
		      	</form>
		      	@endif
		    </ul>
	    </div>
	  </div>
	</nav>
	  
	<div class="container">
	
	  		
	  			@yield('content')

			
	</div>


<footer>
	<br>
	<center>
		<span>Copyright &copy; <?php echo date("Y")?> All rights reserved. |</span>
		<span>Design by NTUST_Yenyen </span> 
	</center>
	<br>
</footer>
</body>
</html>