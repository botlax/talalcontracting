@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="6u -3u 12u(mobilep)">

@include('partials._errors')

{!! Form::open(['route'=>'storeCareer']) !!}
	
	{!! Form::label('position','Position: ') !!}
	{!! Form::text('position',null) !!}

	{!! Form::label('description','Description: ') !!}
	{!! Form::textarea('description',null) !!}

	{!! Form::submit('Add') !!}

{!! Form::close() !!}
</div>
</div>
@stop