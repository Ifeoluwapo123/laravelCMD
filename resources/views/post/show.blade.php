@extends('layouts.app')

@section('content')
	<div style="width: 60%; margin:auto;">
		<div>
		    <a href="/posts" class="btn btn-default">Go Back</a>
		 	<h1>{{$post->title}}</h1>
		 	<div class="row">
		 		<div class="col-md-12">
		 			<img style="width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" alt="">
		 		</div>
		 	</div>
		 	<br>
			<p>{{$post->body}}</p>
			<small>{{$post->created_at}}</small>
		</div>
		<div>
			@if(!Auth::guest())
				@if(Auth::user()->id == $post->user_id)
					<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
					{!!Form::open(['action'=>['PostsController@destroy',$post->id,$post->title],'method'=>'POST', 'class'=>'pull-right'])!!}
					{{Form::hidden('_method', 'DELETE')}}
					{{FORM::submit('Delete',['class'=>'btn btn-danger'])}}
					{!!Form::close()!!}
				@endif
			@endif
		</div>
	</div>
@endsection