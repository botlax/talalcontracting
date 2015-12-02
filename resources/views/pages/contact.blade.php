@extends('master')

@section('meta')
<meta name="_token" content="{!! csrf_token() !!}"/>
@stop
@section('title')
Contact Us
@stop

@section('pagetitle')
Contact Us
@stop

@section('breadcrumb')
	{!! Breadcrumbs::render('contact') !!}
@stop

@section('content')
<div class="wrapper style2">
	<section class="container">
		<div class="row">
			<section class="12u">
				<div id="gmap" class="contact-map">
			</section>
		</div>
		<div class="row" id="contact-details">
			<section class="4u 12u(mobile) hide-narrower">
				<img src="/images/contact.jpg" class="flex">
			</section>
			<div class="8u 12u(narrower)">
				<div class="row">
					<section class="12u">
						<p>
							<strong>For any inquiries, please feel free to visit or call to our office to speak with one of our representatives at any time you please, or use our contact form below. Let us work together in building your future.</strong>
						</p>
					</section>
					<section class="6u full-mobile">
						<h4>Contact Us</h4>
						<div class="address"><strong>Talal Trading &amp; Contracting Co.</strong>
						<p>Villa #61, Jabala Bin Malik St.,<br/>
						Haloul Road, Mamoura,<br/>
						Doha, Qatar
						</p>
						<p>
						<span>Telephone (Line 1)</span><i class="fa fa-phone"></i>&nbsp; +974 4451 5309<br />
						<span>Telephone (Line 2)</span><i class="fa fa-phone"></i>&nbsp; +974 4451 5308<br />
						<span>FAX</span><i class="fa fa-fax"></i>&nbsp; +974 4451 5306<br />
						<span>E-mail</span><i class="fa fa-envelope"></i>&nbsp; <a href="mailto:info@talalcontracting.com">info&#64;talalcontracting.com</a><br />
						<span>Website</span><i class="fa fa-laptop"></i>&nbsp; <a href="http://www.talalcontracting.com">www.talalcontracting.com</a></p>
						</div>
					</section>
					<section class="6u full-mobile">
						<h4>Office Timing</h4>
						<div class="office-timing">
						<p>
						<span>Sat - Wed :</span>8:00am to 1:00pm<br />
						2:00pm to 5:30pm<br />
						<span>Thursday :</span>8:00am to 1:30pm<br/>
						<span>Friday :</span>Holiday</p>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
	<section class="container special contact-wrap">
		<header>
			<h2>SEND US A MESSAGE</h2>
		</header>	

		@include('partials._errors')
		{!! Form::open(['route'=>'sendEmail','id'=>'contact-form','class'=>'row']) !!}
			<div class="5u 12u(mobile)">
				{!! Form::text('name',null,['placeholder'=>'Name*']) !!}

				{!! Form::text('email',null,['placeholder'=>'Email*']) !!}

				{!! Form::text('subject',null,['placeholder'=>'Subject*']) !!}
			</div>
			<div class="7u 12u(mobile)">
				{!! Form::textarea('message',null,['placeholder'=>'Message*','rows'=>7]) !!}

				{!! Form::submit('SEND MESSAGE') !!}
			</div>
		{!! Form::close() !!}
	</section>
</div>

@stop

@section('script')
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
<script src="{{url('assets/js/maplace.min.js')}}"></script>
<script src="{{url('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
	    new Maplace({
	    	map_options: {
				scrollwheel: false
			},
		    locations: [{
		        lat: 25.250432,
		        lon: 51.483769,
		        zoom: 14,
		        title: 'Talal Trading & Contracting Co.',
		        icon: '{{url("/images/map-pin.png")}}',
		        animation: google.maps.Animation.DROP
		    }]
		}).Load();
	});

	$(document).ready(function(){

		jQuery.validator.addMethod("letter", function(value, element) {
		  return this.optional(element) || /^[a-z]+$/i.test(value);
		}, "Your name has a number in it? No way.."); 

		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		var rules = {
		    'email': {
		        required: true,
		        email: true
		    },
		    'subject':{
		    	required: true,
		    },	
		    'name':{
		    	letter: true
		    },
		    'message':{
		    	required: true,
		    	minlength: 15
		    }
	    };
	     var messages = {
	         'email': {
	             required: "Please enter your email address",
	             email: "Incorrect email format: (email_id@domain.com)"
	         },
	         'subject': {
	             required: "Please enter a subject",
	         },
	         'name': {
	             number: "Your name has a number in it? No way.."
	         },
	         'message': {
	             required: "Please give us a brief message",
	             minlength: "Your message should have atleast 15 chars"
	         }
	     };
	     $("#contact-form").validate({
	         rules: rules,
	         messages: messages
	     });

	    $('#contact-form').submit(function(e){
	    	e.preventDefault();
	    	if($("#contact-form").valid()){
				$.ajax({
				      url: '/contact-us',
				      dataType:'text',
				      type: "POST",
				      data: {'name':$('input[name=name]').val(),'subject':$('input[name=subject]').val(),'email':$('input[name=email]').val(),'message':$('textarea[name=message]').val(),},
				      success: function(data){
				      	$('#contact-form').hide();
				      	$('.contact-wrap').append(data);
				      },
				      error: function(ts) { var win = window.open('', '_self');
					win.document.getElementsByTagName('Body')[0].innerText = ts.responseText; }

				});
			}
	    });
	    
	});
</script>
@stop