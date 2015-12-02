@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="12u">
<a class="btn btn-default" href="{{url('/admin/duties/add')}}">Add</a>

@foreach($duties as $duty)

<p>{{$duty->duty}}</p>

@endforeach
</div>
</div>
@stop