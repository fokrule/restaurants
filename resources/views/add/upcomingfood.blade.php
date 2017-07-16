@extends('include.include')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

	<body>
		<div class="container top-spacing">
			<div class="row">
				<div class="panel panel-default">
 			 		<div class="panel-heading">
 			 			<h3 class="col-sm-offset-4">Add Upcoming Food Items</h3>
 			 			@if(Session::has('success'))

				<div class="alert alert-success">
					<strong>{{ Session::get('success') }}</strong>
				</div>

			@endif
			@if(Session::has('denger-success'))

				<div class="alert alert-danger">
					<strong>{{ Session::get('denger-success') }}</strong>
				</div>

			@endif
			@if(count($errors))
				<div class="alert alert-danger">
					<strong>Error:</strong><ul>
					@foreach($errors->all() as $error)
						<li>
							{{ $error }}
						</li>
						</ul>
					@endforeach
	@endif
 			 		</div>
 					<div class="panel-body">
 					
 					{!! Form::open(array('route' =>'upcoming.store', 'method'=>'POST')) !!}
 					{!! csrf_field() !!} 
 						<div class="col-lg-6 col-sm-offset-3 top-spacing">
 							<input type="text" name="menu_name" placeholder="Menu Name.." class="form-control">
 						</div>
 						<div class="col-lg-6 col-sm-offset-3 top-spacing">
 							<input type="text" name="menu_price" placeholder="Menu Price.." class="form-control">
 						</div>
 						<div class="col-lg-6 col-sm-offset-3 top-spacing">
 							<select name="rest_name" class="form-control productname">
													<option value="0" selected="true" disabled="true">Restaurant</option>
													@foreach($allrestaurants as $restaurant =>$p)
													<option value="{!! $restaurant !!} ">{!! $p !!}</option>
													@endforeach

												</select>
 						</div>

 						<div class="col-sm-2 col-sm-offset-8 top-spacing">
 							<button class="btn btn-success">
 								Add +
 							</button>
 						</div>
 						
 					</div>
 					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<footer>
	
			<div class="copyright" style="text-align:center">
				<div class="zerogrid wrapper">
					Copyright @ Resturent Info 2017
				</div>
			</div>
</footer>
	</body>

@endsection