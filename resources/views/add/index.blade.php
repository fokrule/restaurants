@extends('include.include')
@section('content')
	<body  style="background: url(../images/bg_top_img.jpg)">
		<div class="container" style="margin-top: 70px">

			<section class="panel">

				<div class="panel panel-footer">

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

				</div>
				@endif
					<header class="panel panel-default">
						<h3 class="col-sm-offset-5">
							Add Restaurant
						</h3>
					</header>
				</div>
				<div class="panel panel-footer">
					{!! Form::open(array('route' =>'store','id'=>'frmsave','method'=>'POST','files'=>true)) !!}

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" class="form-control" name="rest_name" placeholder="Restaurant Name Here...">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input type="textarea" class="form-control" name="rest_address" placeholder="Restaurant Location">
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="form-group">
								<input type="text" class="form-control" name="rest_mobile" placeholder="Phone Number">
							</div>
						</div>

						<div class="col-lg-4">
							<div class="form-group">
								<input type="text" class="form-control" name="rest_email" placeholder="email">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<input type="text" class="form-control" name="rest_website" placeholder="Website">
							</div>
						</div>

						<div class="col-lg-2 col-sm-2">
							<div class="form-group">
								{!! Form::submit('Save',array('class' => 'btn btn-primary')) !!}
							</div>
						</div>

						<div class="col-lg-12 col-sm-12">
							<div class="form-group">
								<table class="table table-bordered">
									<thead>
										<th>Restaurant Catagory</th>
										<th>Food Name</th>
										<th>Price</th>
										<th>Picture</th>
										<th style="text-align: center;background:red" >
											<a href="#" class="addRow">
												<i class="glyphicon glyphicon-plus"></i>
											</a>
										</th>
									</thead>
									<tbody>
										<tr>
											<td>
												<select name="category_name[]" class="form-control productname">
													<option value="0" selected="true" disabled="true">Food Category</option>
													@foreach($category_name as $key =>$p)
													<option value="{!! $key !!} ">{!! $p !!}</option>
													@endforeach
												</select>
											</td>
											<td> <input type="text" name="menu_name[]" class="form-control qty"> </td>
											<td> <input type="text" name="menu_price[]" class="form-control price"> </td>
											<td> <input type="file" name="image[]" multiple class="form-control file"> </td>
											<td> <a href="#" class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i> </a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>
					{!! Form::hidden('_token',csrf_token()) !!}
					{!! Form::close() !!}
				</div>
			</section>
		</div>
	</body>
	<script type="text/javascript">
	/*$('tbody').delegate('.productname','change',function(){
		var tr=$(this).parent().parent();
		tr.find('.qty').focus();
	});
	$('tbody').delegate('.qty,.price,.dis','keyup',function(){
		var tr =$(this).parent().parent();
		var qty =tr.find('.qty'),val();
		var price =tr.find('.price').val();
		var amount =(qty*price)-(qty*price*dis)/100;
		tr.find('.amount').val(amount);
		total();
	});*/
		$('.addRow').on('click',function()
		{
			addRow();
		});

	
		function addRow()
		{
	var tr='<tr>'+
			    '<td>'+
				'<select name="category_name[]" class="form-control productname">'+
				'<option value="0" selected="true" disabled="true">Food Category</option>'+
				'@foreach($category_name as $key =>$p)'+
				'<option value="{!! $key !!} ">{!! $p !!}</option>'+
				'@endforeach'+
				'</select>'+
				'</td>'+
				'<td> <input type="text" name="menu_name[]" class="form-control qty"> </td>'+
				'<td> <input type="text" name="menu_price[]" class="form-control price"> </td>'+
				'<td> <input type="file" name="image[]" multiple class="form-control file"> </td>'+
				'<td> <a href="#" class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i> </a></td>'+
				'</tr>';
	$('tbody').append(tr);
		};
	$('.remove').live('click',function()
	{
		var l=$('tbody tr').length;
		if(l==1)
		{
			alert('Atlest one Menu needed.');
		}
		else
		{
		$(this).parent().parent().remove();
	}});
	</script>
@endsection