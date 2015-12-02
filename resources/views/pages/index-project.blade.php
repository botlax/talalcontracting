@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="8u -2u 12u(mobile)">
<a class="button" href="{{url('/admin/projects/add')}}">Add</a> 

<table class="bordered">
	
@foreach($projects as $project)
<tr>
<td>{{$project->description}}</td>
<td><a href="{{url('admin/projects/'.$project->id.'/edit')}}"><i class="fa fa-edit"></i></a></td>
<td><a href="{{url('admin/projects/'.$project->id.'/delete')}}"><i class="fa fa-trash"></i></a></td>
</tr>
@endforeach

</table>

</div>
</div>
@stop