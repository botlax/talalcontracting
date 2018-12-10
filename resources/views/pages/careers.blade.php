@extends('master')

@section('title')
Careers
@stop

@section('pagetitle')
Careers
@stop

@section('breadcrumb')
	{!! Breadcrumbs::render('careers') !!}
@stop

@section('content')
<div class="wrapper style2">
	<section id="careers" class="container special">
		<header id="careers-proper">
			<h2>We are hiring!</h2>
			<p>
				<em>We’re always on the lookout for more talented people to join our company. Apply online today!</em>
			</p>
		</header>
		<article>
			<p>There are no vacancies at the moment.</p>
		</article>
	</section>
</div>
@stop

@section('script')
<script src="{{url('assets/js/jquery.leanModal.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){

		if($( "#flash-leanmodal" ).length()){

			$("div#flash-leanmodal").leanModal({ top : 100, overlay : 0.4, closeButton: ".modal_close" });
			$("a.flash-button").leanModal();
			$('a.flash-button').click();

			$('.modal_close').click(function(){
				$("div[id$=leanmodal]").fadeOut(500);
				$("#lean_overlay").fadeOut(500);
			});
		}
	});
</script>
@stop
