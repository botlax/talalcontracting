@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="12u">
<a class="btn btn-default" href="{{url('/admin/locations/add')}}">Add</a>

@foreach($locations as $location)

<p>{{$location->name}}</p>

@endforeach
</div>
</div>
@stop