@if(Session::has('success'))

	<div class="alert alert-success">
		<strong>{{ Session::get('success') }}</strong>
	</div>

@endif
@if(Session::has('denger-success'))

	<div class="alert alert-danger">
		<strong>{{ Session::get('den-success') }}</strong>
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