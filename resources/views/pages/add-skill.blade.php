@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="6u -3u 12u(mobilep)">

@include('partials._errors')

{!! Form::open(['route'=>'storeSkill']) !!}
	
	{!! Form::label('position_id','Position: ') !!}
	{!! Form::select('position_id',$position_list,null) !!}

	{!! Form::label('skill','Skill: ') !!}
	{!! Form::textarea('skill',null) !!}

	{!! Form::submit('Add') !!}

{!! Form::close() !!}
</div>
</div>
@stop