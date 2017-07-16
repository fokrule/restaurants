<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Delete
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/menu2.css">
	<style>
		
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	
</head>
<body>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>DELETE THIS COMMENT?</h1>
			<p>
				<strong>Name:</strong> {{ $comment->name }}<br>
				<strong>Email:</strong> {{ $comment->email }}<br>
				<strong>Comment:</strong> {{ $comment->comment }}
			</p>

			{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
				{!! Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</div>

</body>
</html>