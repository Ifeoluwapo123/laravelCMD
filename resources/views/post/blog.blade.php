@extends('layouts.app')

@section('content')
	<div class="index">
		<h1>Posts</h1>
		@if(count($posts) > 0)
		    <div class="card">
			    <ul class="list-group list-group-flush">
			    @foreach($posts as $post)
					<li class="list-group-item">
						<div>
							<div class="two">
								<img class="profile" src="/storage/cover_images/{{$post->pics}}" alt="">
								 @if($post->pics == 'noimage.jpeg')
								 	<br><a href=""><small><em>Upload Profile Picture</small></em></a>
								 @endif
								<p>Username: {{$post->username}}</p>
							</div>
							<div class="sort">
								<div class="three"><h5><a href="/posts/{{$post->id}}">Post Title: {{$post->title}}</a></h5>
									<small style="color: transparent;text-shadow: 0 0 2px #000">{{$post->body}}</small><br>
									<small>written on the {{$post->created_at}}</small>
								</div>
								<div class="one">
									<img style="width:200px; height: 160px" src="/storage/cover_images/{{$post->cover_image}}" alt=""><br>
									<small><em>Posted Image</em></small>
								</div>
							</div>
						</div>
					</li>
				@endforeach
			    </ul>
			</div>
		@else
			<p>No Posts...</p>
		@endif
	</div>
@endsection