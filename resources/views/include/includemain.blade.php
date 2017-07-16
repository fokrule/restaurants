@extends('include._head')
<div class="wrap-body">
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
           <li  class="{{ Request::is('/') ? "active" : "" }}"><a href='contact.html'><span>Contact</span></a></li>
           <li  class="{{ Request::is('/') ? "active" : "" }}"><a href='about.html'><span>Contact</span></a></li>
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
           <li  class="{{ Request::is('/') ? "active" : "" }} navbar-right"><a href='{{ url('auth/login') }}'><span class="glyphicon glyphicon-log-in" style="margin-right: 3px"></span><span>login</span></a></li>
           @endif
          

      </div>
      <!-- slider start -->
      <div class="custom-banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="../images/1.jpg" style="width: 100%;height: 450px" alt="Los Angeles">
          </div>

          <div class="item">
            <img src="../images/2.jpg" style="width: 100%;height: 450px"  alt="Chicago">
          </div>

          <div class="item">
            <img src="../images/3.jpg" style="width: 100%;height: 450px"  alt="New York">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>

      <!-- slider end -->

    </div>

@yield('content')

<footer>
	
			<div class="copyright" style="text-align:center">
				<div class="zerogrid wrapper">
					Copyright @ Resturent Info 2017
				</div>
			</div>
</footer>
</div>
</html>