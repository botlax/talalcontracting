@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="6u -3u 12u(mobilep)">

@include('partials._errors')

{!! Form::model($member,['route'=>['updateMember',$member->id],'files' => true]) !!}
	
	{!! Form::label('name','Name: ') !!}
	{!! Form::text('name',null) !!}

	{!! Form::label('position','Position: ') !!}
	{!! Form::text('position',null) !!}

	{!! Form::label('description','1st Paragraph: ') !!}
	{!! Form::textarea('description',null) !!}
	
	{!! Form::label('description2','2nd Paragraph: ') !!}
	{!! Form::textarea('description2',null) !!}

	{!! Form::label('description3','3rd Paragraph: ') !!}
	{!! Form::textarea('description3',null) !!}
	
	{!! Form::label('photo','Photo:') !!}
	{!! Form::file('photo',['class'=>'block','enctype'=>'multipart/form-data']) !!}

	{!! Form::submit('Update') !!}

{!! Form::close() !!}
</div>
</div>
@stop