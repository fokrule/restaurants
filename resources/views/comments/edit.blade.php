<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit
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
			<h1>Edit Comment</h1>
			
			{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
			
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) !!}
			
				{!! Form::label('email', 'Email:') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) !!}
			
				{!! Form::label('comment', 'Comment:') !!}
				{!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
			
				{!! Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) !!}
			
			{!! Form::close() !!}
		</div>
	</div>

</body>
</html>