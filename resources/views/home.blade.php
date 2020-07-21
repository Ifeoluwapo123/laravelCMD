@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="float: right;">
                        <a href="/home/{{$id}}"><img style="width: 140px; height: 120px; border:1px solid black; border-radius: 5px;" src="/storage/cover_images/{{$pics}}" alt=""></a>
                        <p style="margin-left: 38px;"><a href="/posts/create" class="btn btn-primary">Create Post</a></p>
                    </div>
                    <div style="margin-top: 100px;">
                        You are logged in!<br/>
                        <h2>My Blog Post(s)</h2>
                    </div>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        @foreach($posts as $post)
                        <tr>
                            <th>{{$post->title}}</th>
                            <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
                            <th></th>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>No Post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
