@extends('main')
@section('title','|Home Page')  
@section('content')
			
<section class="content-box box-2" style="background: url(../bg_top_img.jpg)no-repeat center center fixed; 
					  -webkit-background-size: cover;
					  -moz-background-size: cover;
					  -o-background-size: cover;
					  background-size: cover;">
					<div class="zerogrid" >
						<div class="row wrap-box" >
							<div class="header" >
								<div class="wrapper" >

									<h1 class="color-blue"><span style="color: white">{{$tagpost->category}}</span> </h1>
									<hr class="style13">
									<br>
								
								</div>
							</div>	
								<hr style="height: 5px;background-color: green">
							<div class="col-md-12">
								@foreach($tagpost->catpost as $tc)
								<a href="">
								<div style="margin-left: 500px;margin-top: 30px">
									{{$tc->menu_name}}
									<br>
									</div>

								<div style="margin-left: 500px;margin-top: 30px">
									
									{{$tc->menu_price}}
									<br>
									</div>

								<div style="margin-left: 500px;margin-top: 30px">
									{{$tc->rest->name}}
									<br>
									</div>

								<hr style="height: 5px;background-color: green">
								</a>
								@endforeach
							</div>
							
						</div>
					</div>
	</section>
@endsection
	

	