@extends('master')

@section('title')
Projects
@stop

@section('pagetitle')
Projects
@stop

@section('content')

@section('breadcrumb')
	{!! Breadcrumbs::render('projects') !!}
@stop

<div class="wrapper">
	<section class="container">
		<div class="row">
			<div class="8u -2u 10u(mobile) -1u(mobile)">
				<p class="heading"><strong>We take great pride in our work</strong> and consider safety in the work place, quality of the final product and customer satisfaction as our three key priorities.
				In order to complete projects consistently to the highest quality we have developed Core Operating Principles and Values which guide our approach.</p>
			</div>
		</div>
	</section>
</div>

<nav class="page-nav">
	<ul>
		<li><a href="#" data-id="all">All</a></li>
		<li><a href="#" data-id="completed">Completed</a></li>
		<li><a href="#" data-id="ongoing">Ongoing</a></li>
	</ul>
</nav>


<div class="wrapper style2 after-nav">
	<section class="container">
		<ul class="grid cs-style-1 row" id="projects">
		@foreach($projects as $project)
			<li class="4u 6u(mobile)" data-id="{{$project->status}}">
				<figure>
					<img src="{{url('/images/featured-'.$project->id.'.jpg')}}" alt="img01">
					<a href="{{url('/projects/'.$project->name_link)}}">
						<figcaption>
							<h3>{{$project->name}}</h3>
						</figcaption>
					</a>
				</figure>
			</li>
		@endforeach
		</ul>
	</section>
</div>

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('figure').mouseenter(function(){
			$(this).find('figcaption').stop(true).fadeIn(300);
		});

		$('figure').mouseleave(function(){
			$(this).find('figcaption').stop(true).fadeOut(300);
		});

		$('.page-nav a[data-id=all]').addClass('active');

		$('.page-nav a').click(function(e){
			e.preventDefault();
			var dataId = $(this).attr('data-id');
			
			$('.page-nav a').removeClass('active');
			$('.page-nav a[data-id='+dataId+']').addClass('active');

			if(dataId != 'all'){
				$('#projects li').fadeOut(500);
				$('#projects li[data-id='+dataId+']').fadeIn(500);
			}
			else{
				$('#projects li').fadeIn(500);
			}

		});
	});
</script>
@stop