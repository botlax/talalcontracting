@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="12u">
<a class="btn btn-default" href="{{url('/admin/requirements/add')}}">Add</a>

@foreach($requirements as $requirement)

<p>{{$requirement->requirement}}</p>

@endforeach
</div>
</div>
@stop