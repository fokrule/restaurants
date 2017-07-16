<!DOCTYPE html>
<html lang="en">
<head>

 
    <meta charset="utf-8">
    <title>Restaurant Information @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/zerogrid.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reg_log_style.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery1111.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
     </script>
    @yield('stylesheets')  
</head>
<body>
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
           <li class="{{ Request::is('/') ? "active" : "" }}"><a href='single.html'><span>About</span></a></li>
           <li  class="{{ Request::is('/') ? "active" : "" }}"><a href='contact.html'><span>Contact</span></a></li>            @if(Auth::check())
             <li class='has-sub navbar-right'><a href='#'><span>Name</span></a>
          
            <ul>
           <li class="{{ Request::is('/') ? "active" : "" }}"><a href=''><span> Restaurant</span></a></li>
           <li class="{{ Request::is('/') ? "active" : "" }}"><a href='single.html'><span> UpcomingFood</span></a></li>
           <li  class="{{ Request::is('/') ? "active" : "" }}"><a href='{{ url('auth/logout') }}'><span>logout</span></a></li>
            </ul>
            
    
           </li>
           
           @else

           <li  class="{{ Request::is('auth/register') ? "active" : "" }} navbar-right"><a href='{{ url('auth/register') }}'><span class="glyphicon glyphicon-user"></span><span>register</span></a></li>
           <li  class="{{ Request::is('auth/login') ? "active" : "" }} navbar-right"><a href='{{ url('auth/login') }}'><span class="glyphicon glyphicon-log-in" style="margin-right: 3px"></span><span>login</span></a></li>
           @endif
          

      </div>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 col-lg-offset-4 reg-img">
        
                <img src="../images/reg.jpg" class="img-responsive" alt="">
        
            </div>
         <form method="POST" action="/auth/register">
    {!! csrf_field() !!}

            <div class="col-sm-4 col-sm-offset-4 reg-back-img">
                <div class="row">

                        <div class="col-lg-10">
                 
                         <div class="form-group">
                                <input type="text" class="form-control form" name="name" value="{{ old('name') }}" placeholder="Name Here...">
                            </div> 

                            <div class="form-group">
                                <input type="email" class="form-control form" name="email" value="{{ old('email') }}" placeholder="Email Here...">
                            </div>
                           <div class="form-group">
                                <input type="password" class="form-control form" name="password" id="password" placeholder="Password Here...">
                            </div>
                           <div class="form-group">
                                <input type="password" class="form-control form" name="password_confirmation" id="password" placeholder="Password Here...">
                            </div>
                        </div>
                </div>
                
            </div>
                <div class="col-sm-4 col-sm-offset-4 reg-back-img">
                <div class="row"  style="background-color: #C9AA62">
                        <div class="col-lg-10">
                             <button class="btn-lg" style="margin-left: 65px; background-color:#C9AA62;border: 0px">
                            <i class="btn-lg"></i>
                            <span class="state"><i class="fa fa-sign-in"></i> Let&#039;s Go !</span>
                            </button>
                                                    
                        </div>
                </div>
                
            </div>
        </form>
        
        </div>
        
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
</body >
</html>