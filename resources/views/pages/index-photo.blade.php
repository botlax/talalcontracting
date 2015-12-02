@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="12u">
<a class="btn btn-default" href="{{url('/admin/photos/add')}}">Add</a>

@foreach($photos as $photo)

<img src="/images/{{$photo->name}}" width="300"></div>

@endforeach
</div>
</div>
@stop