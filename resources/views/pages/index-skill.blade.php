@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="12u">
<a class="btn btn-default" href="{{url('/admin/skills/add')}}">Add</a>

@foreach($skills as $skill)

<p>{{$skill->skill}}</p>

@endforeach
</div>
</div>
@stop