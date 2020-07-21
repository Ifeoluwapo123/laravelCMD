@extends('layouts.app')

@section('content')
	<div style="border: 1px solid black; border-radius: 5px; width: 60%; margin:auto; padding: 10px;">
		<h2 style="font-family: cursive; text-align: center;">Upload A Picture For Your Profile.</h2>
		<div style="margin-top: 50px; margin-left: 30%">
			{!! Form::open(['action' => ['HomeController@update',$post], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
		    {{Form::file('cover_image')}}
		    {{Form::hidden('_method','PUT')}}<br><br>
		    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
		    {!! Form::close() !!}
	    </div>
    </div>
@endsection