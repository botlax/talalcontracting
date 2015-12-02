@extends('master')
@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="6u -3u 12u(mobilep)">

@include('partials._errors')

{!! Form::open(['route'=>['storePhoto'],'files' => true]) !!}

	{!! Form::label('project_id','Upload photos for: ') !!}
	{!! Form::select('project_id',$project_list,null) !!}

	{!! Form::label('featured','Featured:') !!}
	{!! Form::file('featured',['class'=>'block','enctype'=>'multipart/form-data']) !!}

	{!! Form::label('photo[]','Photo:') !!}
	{!! Form::file('photo[]',['class'=>'block','multiple'=>true,'enctype'=>'multipart/form-data']) !!}

	{!! Form::submit('Add') !!}

{!! Form::close() !!}
</div>
</div>
@stop