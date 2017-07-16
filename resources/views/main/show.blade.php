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
									<h1 class="color-blue"><span style="color: white">
									{{ $restaurant->name }}
									<br>
				 					<small style="color: white"> Total:<span class="badge">{{ $restaurant->menu()->count() }}</span> Menu Added</small> </span> </h1>
									<hr class="style13">
									<br>
								</div>
							</div>	
							
							
						</div>
					</div>
			
			
		@foreach($restaurant->menu2 as $rest)
		<div class="col-md-6" style="background-color: black;border-right: 2px solid white;border-bottom: 2px solid white;color: white">
			<div class="col-md-6">
			<h4>Menu:</h4><p>{{$rest->menu_name}}</p>	
				<br>
				<h4>price:</h4><p>{{$rest->menu_price}}</p>	
				<img src="{{asset('images2/'.$rest->image)}}" alt="">
				<h4>Review:5/5</h4>
				<?php $menu_id=$rest->id;?>
				@foreach($all_review as $allreview)
				
			
				@if($menu_id==$allreview->mnu_id)
				{{$allreview->review}}
				@endif
				@endforeach
				@if (Auth::check()) 
					{!! Form::open(array('route' =>'allcontroller.store', 'method'=>'POST')) !!}
 					{!! csrf_field() !!} 
 					
 							<input type="hidden" name="menu_id" value="{{$rest->id}}">
 						
 							<select name="review" class="form-control">
 								<option value="1">1</option>
 								<option value="2">2</option>
 								<option value="3">3</option>
 								<option value="4">4</option>
 								<option value="5">5</option>
 							</select>

 							<button class="btn btn-success">
 								Add +
 							</button>
 					
 					{!! Form::close() !!}
				@endif
				<br>
			</div>
			
		
		<br>
		
		</div>
		@endforeach
	</section>
			
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $restaurant->comments()->count() }} Review</h3>
			@foreach($restaurant->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>
						<div class="comment-content">
						{{ $comment->comment }}
					</div>
						@if (Auth::check()) 
						<?php $u_id=Auth::user()->id;
							 $c_id=$comment->user_id; ?>
							@if($u_id==$c_id) 
						<div class="author-name">
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
						@endif
						@endif
					</div>

					

				</div>
			@endforeach
		</div>
	</div>

@if (Auth::check()) 
		<div class="row" style="margin-top: 40px">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			{!! Form::open(['route'=>['comments.store',$restaurant->id],'method'=>'POST'])!!}
			<div class="col-md-12">
				{!! Form::label('comment',"Comment:") !!}
				{!! Form::textarea('comment',null,['class'=>'form-control']) !!}
				{!! Form::submit('comment',['class'=>'btn btn-success']) !!}
			</div>

			{!! Form::close()!!}
		</div>
	</div>
@endif



@endsection