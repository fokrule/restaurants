<!DOCTYPE html>
<html>
<head>
	<title>Add Restaurant</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/zerogrid.css">
    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/style_all.css">
  
 
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
</script>
</head>
<body>
<div class="header">

      <div id='cssmenu' >

        <ul>
           <li  class="{{ Request::is('all') ? "active" : "" }}"><a href='{{url('all')}}'><span>Home</span></a></li>

            
           <li class='has-sub'><a href='#'><span>Category</span></a>
          
            <ul>
            @foreach($cat as $ct)             
             <li  class="{{ Request::is('/') ? "active" : "" }}"><a href=" {{Route('categorypost.show',$ct->id)}}"><span>{{ $ct->category }}</span></a>
               
             </li>
            @endforeach
            </ul>
            
    
           </li>
           <li  class="{{ Request::is('Contact') ? "active" : "" }}"><a href='contact.html'><span>Contact</span></a></li>
           <li  class="{{ Request::is('About') ? "active" : "" }}"><a href='about.html'><span>Contact</span></a></li>
            @if(Auth::check())
             <li class='has-sub navbar-right'><a href='#'><span>Name</span></a>
          
            <ul>
           <li class="{{ Request::is('/') ? "active" : "" }}"><a href=''><span> Restaurant</span></a></li>
           <li class="{{ Request::is('/') ? "active" : "" }}"><a href='single.html'><span> UpcomingFood</span></a></li>
           <li  class="{{ Request::is('/') ? "active" : "" }}"><a href='{{ url('auth/logout') }}'><span>logout</span></a></li>
            </ul>
            
    
           </li>
           
           @else

           <li  class="{{ Request::is('auth/register') ? "active" : "" }} navbar-right"><a href='{{ url('auth/register') }}'><span class="glyphicon glyphicon-user"></span><span>register</span></a></li>
           <li  class="{{ Request::is('auth/login') ? "active" : "" }} navbar-right">
           <a href='{{ url('auth/login') }}'><span class="glyphicon glyphicon-log-in" style="margin-right: 3px"></span><span>login</span></a></li>
           @endif
          

      </div>
    </div>
	@yield('content')
	 <footer>
  
      <div class="copyright" style="text-align:center">
        <div class="zerogrid wrapper">
          Copyright @ Resturent Info 2017
        </div>
      </div>
</footer>
</body>
</html>