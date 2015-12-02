@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="12u">
<a class="btn btn-default" href="{{url('/admin/careers/add')}}">Add</a>

@foreach($positions as $position)

<p>{{$position->position}}</p>

@endforeach
</div>
</div>
@stop