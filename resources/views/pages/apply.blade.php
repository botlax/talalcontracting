@extends('master')

@section('title')
{{$position->position}} Application
@stop

@section('pagetitle')
Apply
@stop

@section('style')
<link rel="stylesheet" href="{{url('/assets/css/select2.min.css')}}" />
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
        <li><a href="http://talalcontracting.dev">Home</a><span>&#187;</span></li>
        <li><a href="http://talalcontracting.dev/careers">Careers</a><span>&#187;</span></li>
        <li><a href="http://talalcontracting.dev/careers/{{$position->position_link}}">{{$position->position}}</a><span>&#187;</span></li>
        <li class="active">Apply</li>
    </ul>
@stop

@section('content')
<div class="wrapper style2">
	<section id="career" class="container special">
		<div class="row">
			<article class="8u -2u 10u(mobile) -1u(mobile)">

				<header>
					<h2 class="align-left">{{$position->position}}</h2>
					<p>Thank you for considering a career at Talal. Please take a minute to fill out the following form. After you have completed your application an email will be sent to you containing your application details and confirmation that we have received your entry.</p>
				</header>
				@if (count($errors) > 0)
					<p class="error">Please fix the errors below</p>
				@endif
				{!! Form::open(['route' => ['storeApplication',$position->id],'files' => true,'id'=>'application-form']) !!}

				{!! Form::label('resume','Upload your Resume(pdf):') !!}
				{!! Form::file('resume',['class'=>'block','enctype'=>'multipart/form-data']) !!}
				@foreach($errors->get('resume') as $resume)
					<label class="error">{{$resume}}</label>
				@endforeach
				{!! Form::text('firstname',null,['placeholder' => 'Firstname*']) !!}
				@foreach($errors->get('firstname') as $firstname)
					<span class="error">{{$firstname}}</span>
				@endforeach
				{!! Form::text('lastname',null,['placeholder' => 'Lastname*']) !!}
				@foreach($errors->get('lastname') as $lastname)
					<span class="error">{{$lastname}}</span>
				@endforeach
				{!! Form::select('country',$countries,null) !!}
				@foreach($errors->get('country') as $country)
					<span class="error">{{$country}}</span>
				@endforeach
				{!! Form::text('email',null,['placeholder' => 'Email*']) !!}
				@foreach($errors->get('email') as $email)
					<span class="error">{{$email}}</span>
				@endforeach
				{!! Form::text('mobile',null,['placeholder' => 'Mobile']) !!}
				@foreach($errors->get('mobile') as $mobile)
					<span class="error">{{$mobile}}</span>
				@endforeach

				{!! Form::label('coverletter','Cover Letter: ') !!}
				{!! Form::textarea('coverletter',null) !!}

				<div class="submit-wrap"><button>Submit Application</button></div>
				{!! Form::close() !!}
			</article>
		</div>
	</section>
</div>
@stop

@section('script')
<script src="{{url('/assets/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select[name=country]").select2({
		  placeholder: "Country*",
		  allowClear: true
		});

		$('#application-form').submit(function(){
			$(this).find('input[type=text]').prop('disabled',true);
			$(this).find('input[type=file]').prop('disabled',true);
			$(this).find('textarea').prop('disabled',true);
			$(this).find('select').prop('disabled',true);
			$(this).find('button').prop('disabled',true);
			$(this).find('.submit-wrap').html('<i class="fa fa-cog fa-spin fa-3x"></i>');
		});
	});
</script>
@stop
