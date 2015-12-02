@extends('master')

@section('title')
{{$position->position}}
@stop

@section('pagetitle')
Careers
@stop

@section('breadcrumb')
	{!! Breadcrumbs::render('career',$position) !!}
@stop

@section('content')
<div class="wrapper style2">
	<section id="career" class="container special">
		<div class="row">
			<article class="8u 12u(mobile)">
				<a href="{{url('/careers/'.$position->position_link.'/apply')}}" class="button pull-right">Apply</a>
				<header>
					<h2 class="align-left">{{$position->position}}</h2>
				</header>
				<section>
					<p>{{$position->description}}</p>
				</section>
				<section>
					<h4>Duties &amp; Responsibilities</h4>
					<ul class="fa-ul">
					@foreach($duties as $duty)
						<li><i class="fa-li fa fa-check-square-o"></i>{{$duty->duty}}</li>
					@endforeach
					</ul>
				</section>
				<section>
					<h4>Specific Skills / Knowledge</h4>
					<ul class="fa-ul">
					@foreach($skills as $skill)
						<li><i class="fa-li fa fa-check-square-o"></i>{{$skill->skill}}</li>
					@endforeach
					</ul>
				</section>
				<section>
					<h4>Minimum Requirements</h4>
					<ul class="fa-ul">
					@foreach($requirements as $requirement)
						<li><i class="fa-li fa fa-check-square-o"></i>{{$requirement->requirement}}</li>
					@endforeach
					</ul>
				</section>
				<footer>
					<a href="{{url('/careers/'.$position->position_link.'/apply')}}" class="button">Apply</a>
				</footer>
			</article>
			<aside class="4u 12u(mobile)">
				<section>
					<h4>{{$asideTitle}}</h4>
					<ul class="fa-ul">
					@foreach($related as $job)
						<li><i class="fa-li fa fa-black-tie"></i><a href="{{url('/careers/'.str_replace(' ','-',strtolower($job->position)))}}">{{$job->position}}</a></li>
					@endforeach
					</ul>
				</section>
				<section>
					<a href="{{url('/careers#careers-proper')}}" class="button no-margin flex">View all Available Jobs</a>
				</section>
			</aside>
		</div>
	</section>
</div>

@stop
