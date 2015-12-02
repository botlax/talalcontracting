@extends('master')

@section('title')
{{$title}}
@stop

@section('pagetitle')
{{$title}}
@stop

@section('content')

@section('breadcrumb')
	{!! Breadcrumbs::render('project',$project) !!}
@stop

<div class="wrapper style1 project">
	<section class="container">
		<div class="row">
			<section class="4u 12u(mobile)">
				<article>
					<h3>Description</h3>
					<p>{{$project->description}}</p>
				</article>

				<section>
					<h3>Details</h3>
					<ul>
						<li><i class="fa fa-user"></i>&nbsp; <span>Client: </span>{{$project->client}}</li>
						<li><i class="fa fa-group"></i>&nbsp; <span>Consultant: </span>{{$project->consultant}}</li>
						<li><i class="fa fa-calendar"></i>&nbsp; <span>Project Programme: </span>{{$project->start_date->format('F Y')}} - {{$project->completion_date->format('F Y')}}</li>
					</ul>
				</section>

				<section>
					<h3>Location</h3>
					<div id="gmap"></div>
				</section>

				<nav>
					<ul>
						@if($prevLink)
						<li><a class="pull-left" href="{{url('/projects/'.str_replace(' ','-',strtolower($prevLink)))}}" title="{{$prevLink}}"><i class="fa fa-chevron-circle-left"></i>&nbsp; Previous</a></li>
						@endif
						@if($nextLink)
						<li><a class="pull-right" href="{{url('/projects/'.str_replace(' ','-',strtolower($nextLink)))}}" title="{{$nextLink}}">Next&nbsp; <i class="fa fa-chevron-circle-right"></i></a></li>
						@endif
					</ul>
				</nav>
			</section>
			<aside class="8u 12u(mobile)">
				<div class="row">
				<?php $counter = 1; ?>
				@foreach($photos as $photo)
					@if(in_array($counter, [2,3,5,6,8,9]))
					<div class="6u 12u(mobile)">
						<img src="{{url('/images/'.$photo)}}" class="block img">
					</div>
					@else
					<div class="12u">
						<img src="{{url('/images/'.$photo)}}" class="block img">
					</div>
					@endif
					<?php $counter++; ?>
				@endforeach
				</div>
			</aside>
		</div>
	</section>
</div>
@stop

@section('script')
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
<script src="{{url('assets/js/maplace.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
	    new Maplace({
	    	map_options: {
				scrollwheel: false
			},
	    	show_markers: {{$marker}},
		    locations: [{
		        lat: {{$location[0]}}, 
		        lon: {{$location[1]}},
		        zoom: {{$zoom}},
		        title: 'Title A1',
		        icon: 'http://maps.google.com/mapfiles/markerA.png',
		        animation: google.maps.Animation.DROP
		    }]
		}).Load();
	});
</script>
@stop
