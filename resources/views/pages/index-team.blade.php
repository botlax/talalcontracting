@extends('master')

@section('meta')
<meta name="robots" content="nofollow">
@stop

@section('content')

<div class="row">
<div class="8u -2u 12u(mobile)">
<a class="button" href="{{url('/admin/team/add')}}">Add</a> 

<table class="bordered">
	
@foreach($members as $member)
<tr>
<td>{{$member->name}}</td>
<td><a href="{{url('admin/team/'.$member->id.'/edit')}}"><i class="fa fa-edit"></i></a></td>
<td><a href="{{url('admin/team/'.$member->id.'/delete')}}"><i class="fa fa-trash"></i></a></td>
</tr>
@endforeach

</table>

</div>
</div>
@stop