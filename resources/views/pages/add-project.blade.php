@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="6u -3u 12u(mobilep)">

@include('partials._errors')

{!! Form::open(['route'=>'storeProject']) !!}
	
	{!! Form::label('name','Name: ') !!}
	{!! Form::text('name',null) !!}

	{!! Form::label('description','Description: ') !!}
	{!! Form::textarea('description',null) !!}
	
	{!! Form::label('client','Client: ') !!}
	{!! Form::text('client',null) !!}

	{!! Form::label('consultant','Consultant: ') !!}
	{!! Form::text('consultant',null) !!}

	{!! Form::label('status','Status') !!}
	{!! Form::select('status',['completed' => 'Completed','ongoing' => 'Ongoing'],null) !!}

	{!! Form::label('start_date','Start Date: ') !!}
	{!! Form::input('date','start_date',date('Y-m-d')) !!}

	{!! Form::label('completion_date','Completion Date: ') !!}
	{!! Form::input('date','completion_date',date('Y-m-d')) !!}

	{!! Form::submit('Add') !!}

{!! Form::close() !!}
</div>
</div>
@stop