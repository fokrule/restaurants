@extends('main')
@section('title','|Home Page')  
@section('content')
			
				<section class="content-box box-2" style="background: url(bg_top_img.jpg)no-repeat center center fixed; 
					  -webkit-background-size: cover;
					  -moz-background-size: cover;
					  -o-background-size: cover;
					  background-size: cover;">
					<div class="zerogrid" >
						<div class="row wrap-box" >
							<div class="header" >
								<div class="wrapper" >
									<h1 class="color-blue"><span style="color: white">Resturants</span> </h1>
									<hr class="style13">
									<br>
								</div>
							</div>	
							@foreach($restaurant as $article)
										
							<div class="table-responsive table-part">
								
							<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th style="text-align: center;color: white">Name</th>
							      <th style="text-align: center;color: white">Mobile</th>
							      <th style="text-align: center;color: white">Address</th>
							      <th style="text-align: center;color: white">View Menu</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td><h1 style="color: white"> {!! $article->name !!} </h1></td>
							    
							      <td style="text-align: center;"><p style="margin-top: 15px;color: white">{!! $article->rest_mobile !!}</p></td>
							      <td style="text-align: center;"><p style="margin-top: 15px;color: white">{!! $article->rest_address !!}</p></td>
							      <td style="text-align: center;">
							      	{!! Html::LinkRoute('allcontroller.show','View',array($article->id),array('class'=>'btn btn-default')) !!}

							      </td>
							    </tr>
							   
							  </tbody>
							</table>
							
							</div>
							@endforeach
							
						</div>
					</div>
				</section>
			
				<section class="content-box boxstyle-2 box-3">
					<div class="zerogrid">
						<div class="row wrap-box">
							<div class="row">
							<div class="header" >
								<div class="wrapper" >
									<h2 style="margin-bottom: 30px;color: #0B9D82;mag=margin-left: 0px">Upcomming Food >></h2>
									<hr class="style13">
									<br>
								</div>
							</div>	
								@foreach($food as $foods)
									<div class="col-md-6" style="margin-bottom: 30px">
									
								
									<div class="wrap-col">
									<div class="col-md-7"><p class="uppercase">
										<b><i>Menu Name: </i>{!! $foods->menu_name !!} </b>
										<br>
										<b><i>Price: </i>{!! $foods->menu_price !!}TK</b>
										<br>
										<b><i>Restaurant: </i>{!! $foods->rest->name !!} </b>
										</p>
										</div>
										<div class="col-md-5"><img class="img-responsive" src="images/4.jpg" alt=""/></div>
										
									</div>
								</div>
								
								
							@endforeach
							
							</div>
							
						</div>
					</div>
				</section>
				<div class="search">
				{!! Form::open(array('route'=>'search.index','method'=>'GET')) !!}
					<input class="form-control" type="text" name="search">
					<button class="form- sm">submit</button>
				{!! Form::close() !!}
				</div>
				
			</div>
		</section>
@endsection