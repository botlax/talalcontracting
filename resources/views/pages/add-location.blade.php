@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="6u -3u 12u(mobilep)">

@include('partials._errors')

{!! Form::open(['route'=>['storeLocation']]) !!}
	
	{!! Form::label('name','Location: ') !!}
	{!! Form::text('name',null) !!}

	{!! Form::label('project_id','Project: ') !!}
	{!! Form::select('project_id',$project_list,null) !!}

	{!! Form::submit('Add') !!}

{!! Form::close() !!}
</div>
</div>
@stop