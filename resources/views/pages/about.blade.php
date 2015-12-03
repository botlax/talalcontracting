@extends('master')

@section('title')
About Us
@stop

@section('pagetitle')
About Us
@stop

@section('breadcrumb')
	{!! Breadcrumbs::render('about') !!}
@stop

@section('content')
<div class="wrapper">
	<article class="container" id="about-us">
		<p><img src="/images/walid.jpg" alt="Walid Abdulkader Photo" class="inline-photo"><span class="quote"></span>I would like to take this opportunity to introduce <strong><a href="{{url()}}">Talal Trading &#38; Contracting Company Co.</a></strong> (Talal) as our esteemed organization. Established in 1991, TALAL's main activities include <em>civil and building construction, infrastructure and maintenance works</em>. Until 1994, Talal kept a moderate scale of projects and work force. Since then, the company has grown rapidly and has become one of the leading Construction Companies in its classification. TALAL is classified by the Central Tenders Committee as a <em>Grade A building construction contractor</em>.</p>
		<p>
		With the help of a team of professionals experienced in the fields of Management, Construction, Engineering, Planning, Health &#38; Safety, Quality Assurance &#38; Quality Control and Administration, Talal has maintained an excellent record of delivering high quality Projects in time and within budget.</p>
		<p>
		In TALAL we consider Clients and their Consultants as partners and work closely with them to complete and deliver Project in a professional manner and to the satisfaction of all parties.</p>
		<p class="author">Walid Abdulkader</p>
		<p class="author-position">General Manager</p>
	</article>
</div>
<nav class="page-nav">
	<ul>
		<li><a href="#about-us">Top</a></li>
		<li><a href="#our-team">Our Team</a></li>
		<li><a href="#clients">Our Clients</a></li>
		<li><a href="#what-we-do">Our Work</a></li>
		<li><a href="#hse">HSE</a></li>
	</ul>
</nav>
<div class="wrapper style2 after-nav">
	<section class="container special" id="our-team">
		<header>
			<h2>Our Team</h2>
		</header>
		<!--<img class="image featured" data-alt-src="{{url('images/header.jpg')}}" src="{{url('images/pic06.jpg')}}" />-->
		<div class="row">

		@foreach($team as $member)
			<div class="6u 12u(mobile)">
				<div class="team-member clearfix">
					<img src="/images/{{$member->photo}}" alt="{{$member->name}} Photo" class="team-member-photo">
					<p>{{$member->name}}</p>
					<p>{{$member->position}}</p>
					<a class="button-small" href="#{{$member->first_name}}-leanmodal" rel="leanModal">Work History</a>
				</div>
			</div>
		@endforeach
		</div>
	</section>
</div>

<div class="wrapper style3">
	<section class="container" id="clients">
		<div class="row">
			<div class="4u 12u(mobile)">
				<header class="align-right">
					<h2><span class="text xl">Our</span> <span class="text sm">Prestigous</span> <span class="text lg">Clients</span></h2>
				</header>
			</div>
			<div class="8u 12u(mobile)">
				<div class="row">
					<section class="4u 6u(mobile)">
						<h3>Hamad Medical Corporation</h3>
						<a href="https://www.hamad.qa/EN/Pages/default.aspx" target="_blank"><img src="{{url('images/clients/hamad.png')}}" alt="Hamad Medical Corporation" title="Hamad Medical Corporation" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Ashghal - Public Works Authority</h3>
						<a href="http://www.ashghal.gov.qa/en/Pages/default.aspx" target="_blank"><img src="{{url('images/clients/ashghal.png')}}" alt="Ashghal - Public Works Authority" title="Ashghal - Public Works Authority" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Ministry of Foreign Affairs</h3>
						<a href="http://www.mofa.gov.qa/en/Pages/default.aspx" target="_blank"><img src="{{url('images/clients/ministry-of-foreign-affairs.png')}}" alt="Ministry of Foreign Affairs" title="Ministry of Foreign Affairs" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Ministry of Municipality and Urban Planning</h3>
						<a href="www.baladiya.gov.qa/cui/index.dox?siteID" target="_blank"><img src="{{url('images/clients/ministry-of-urban-planning.png')}}" alt="Ministry of Municipality and Urban Planning" title="Ministry of Municipality and Urban Planning" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Qatar International Islamic Bank</h3>
						<a href="http://www.qiib.com.qa/" target="_blank"><img src="{{url('images/clients/qiib.png')}}" alt="Qatar International Islamic Bank" title="Qatar International Islamic Bank" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Qatar General Insurance</h3>
						<a href="http://www.qgirco.com/english/" target="_blank"><img src="{{url('images/clients/qgi.png')}}" alt="Qatar General Insurance" title="Qatar General Insurance" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Qatar Petroleum</h3>
						<a href="https://www.qp.com.qa/en/Pages/Home.aspx" target="_blank"><img src="{{url('images/clients/qp.png')}}" alt="Qatar Petroleum" title="Qatar Petroleum" class="flex"/></a>
					</section>
					<section class="4u 6u(mobile)">
						<h3>Ooredoo</h3>
						<a href="http://www.ooredoo.qa/" target="_blank"><img src="{{url('images/clients/ooredoo.png')}}" alt="Ooredoo" title="Ooredoo" class="flex"/></a>
					</section>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="wrapper style2">
	<section id="what-we-do" class="container special">
		<header>
			<h2>What we do</h2>
			<p>Our projects can be classified as follows</p>
		</header>
		<div class="row">
			<article class="4u 6u(narrower) full-mobile special">
				<a href="#" class="image featured"><img src="images/what-we-do/beautify.png" alt="" /></a>
				<header>
					<h3>Asphalt and Beautification Works</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special">
				<a href="#" class="image featured"><img src="images/what-we-do/mosque.png" alt="" /></a>
				<header>
					<h3>Commercial multi-storey Buildings, Office Buildings, Mosques, Palaces, Villa Compounds and individual Villas</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special">
				<a href="#" class="image featured"><img src="images/what-we-do/factory.png" alt="" /></a>
				<header>
					<h3>Factory Buildings and Labour Accommodations</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special clear">
				<a href="#" class="image featured"><img src="images/what-we-do/landscape.png" alt="" /></a>
				<header>
					<h3>Hard and Soft Landscaping</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special">
				<a href="#" class="image featured"><img src="images/what-we-do/pipe.png" alt="" /></a>
				<header>
					<h3>Drainage Networks and Connections</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special">
				<a href="#" class="image featured"><img src="images/what-we-do/telephone.png" alt="" /></a>
				<header>
					<h3>Telephone Cables and Manholes</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special clear">
				<a href="#" class="image featured"><img src="images/what-we-do/helipad.png" alt="" /></a>
				<header>
					<h3>Helipads</h3>
				</header>
			</article>
			<article class="4u 6u(narrower) full-mobile special">
				<a href="#" class="image featured"><img src="images/what-we-do/maintenance.png" alt="" /></a>
				<header>
					<h3>Refurbishment and General Maintenance for Offices and Residential Buildings</h3>
				</header>
			</article>
		</div>
	</section>
</div>

<div class="wrapper style2">
	<article id="hse" class="container special">
		<img class="image featured" src="images/hse-bg.jpg" alt="Health and Safety" />
		<header>
			<h2><a href="#">Health &#38; Safety</a></h2>
			<p>
				<em>At Talal we place the highest priority on the Health and Safety of our employees.</em>
			</p>
		</header>
		<p>
			Our highest priority on the Health and Safety of our employees, employees of others working on our projects, visitors and members of the Public. We are committed to creating an excellent Health &#38; Safety culture in all areas of our business.
		</p>
		<p>
			We believe that Health &#38; Safety is a state of mind and a culture and have invested heavily and will continue to invest in training our employees and providing the required equipment and tools to achieve our goal of an excellent Health &#38; Safety culture and a safe workplace for everyone.
		</p>
		<p>
			Our Health &#38; Safety Management system is one of our key operating systems. It covers and implements the standards required by ISO9001:2008 and OHSAS 18001:2007 (Occupational Health & Safety Management System).
		</p>
	</article>
</div>

<div class="wrapper style2">
	<section id="our-principles" class="container special">
		<header>
			<h2>We Apply the Priciple of . . .</h2>
		</header>
		<div class="row">
			<div class="12u">
				<div class="row">
					<div class="4u 8u(mobile) -2u(mobile) pull12 push-right">
						<img class="flex" src="/images/principles/hse-engineering.jpg" alt="engineering">
					</div>
					<div class="8u 12u(mobile)">
						<p><strong>Engineering.</strong> We assess the potential hazards on each project and plan our works in a way to eliminate the unsafe conditions. We plan our working methods, plant, equipment, deliveries, access / egress arrangements, emergency procedures, site offices, storage areas and welfare arrangements in detail and aim at eliminating the unsafe conditions,</p>
					</div>
				</div>
				<div class="row">
					<div class="4u  8u(mobile) -2u(mobile)">
						<img class="flex" src="/images/principles/hse-eval.jpg" alt="evaluation">
					</div>
					<div class="8u 12u(mobile)">
						<p><strong>Evaluation.</strong> We carry out regular review of our procedures, systems, training, working practices and aim at continually improving our Health & Safety performance. We have developed safety committees, carry out formal inspections and audits and welcome feedbacks to assist us with our evaluation.</p>
					</div>
				</div>
				<div class="row">
					<div class="4u  8u(mobile) -2u(mobile) pull12 push-right">
						<img class="flex" src="/images/principles/hse-encourage.jpg" alt="encouragement">
					</div>
					<div class="8u 12u(mobile)">
						<p><strong>Encouragement.</strong> We welcome and encourage any initiative to enhance our safety performance. We reward the staff and operatives, including those of our subcontractors, on our Projects for working safely, implementing our safety procedures and achieving our standards.</p>
					</div>
				</div>
				<div class="row">
					<div class="4u  8u(mobile) -2u(mobile)">
						<img class="flex" src="/images/principles/hse-educ.jpg" alt="education">
					</div>
					<div class="8u 12u(mobile)">
						<p><strong>Education.</strong> We train our staff and operatives, enhance their knowledge and aim at eliminating the unsafe acts.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="wrapper style2 clearfix">
	<article class="container special" id="iif">
		<header>
			<h3>Insident and Injury Free Programme</h3>
		</header>
		<p><img src="/images/iif.png" class="inline-photo" alt="iif">We launched our <em>"Incident and Injury Free Programme"</em> in mid 2010 at our project in The Pearl Qatar. This programme aims at training our employees to become more aware of the hazards and the risks posed by each activity to themselves and others and take a more responsible attitude to eliminating and/or minimizing the risks.</p>
	</article>
</div>

<div id="lean_overlay"></div>

@foreach($team as $member)
<div id="{{$member->first_name}}-leanmodal">
	<a class="modal_close" href="#"></a>
	<section>
		<div class="row">
			<div class="4u 12u(mobile)">
				<img src="/images/{{$member->photo}}" alt="{{$member->name}} Photo" class="inline-photo">
				<p class="name-modal">{{$member->name}}</p>
				<p class="position-modal">{{$member->position}}</p>
			</div>
			<div class="8u 12u(mobile)">
				
				@if($member->description)
					<p>{{$member->description}}</p>
				@endif
				@if($member->description2)
					<p>{{$member->description2}}</p>
				@endif
				@if($member->description3)
					<p>{{$member->description3}}</p>
				@endif

			</div>
		</div>
	</section>
</div>
@endforeach

@stop

@section('script')
<script src="{{url('assets/js/jquery.leanModal.min.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function(){

		var bdHeight = $('nav.page-nav ul').outerHeight();

		$(window).scroll(function(){
			var heightToFix = $('.after-nav').position().top - $(window).scrollTop();
			if(heightToFix < 0){
				//alert('fix');
				$('nav.page-nav').css({"position":"fixed","top":0,"width":"100%"});
			}
			else if(heightToFix >0){
				$('nav.page-nav').css({"position":"relative","top":"3em"});
			}
		});

		$(window).scroll(function(){
			var heightToFix = $('#our-team').position().top - $(window).scrollTop();
			if(heightToFix < ($( window ).height() / 2)){
				var counter = 300;
				$('.team-member').each(function(){
					$(this).animate({
					    left:'0',
					    opacity:'1'
					},counter);
					counter = counter + 300;
				});
			}
		});

		$(window).scroll(function(){
			var heightToFix = $('#clients').position().top - $(window).scrollTop();
			if(heightToFix < ($( window ).height() / 2)){
				var counter = 200;
				$('#clients section').each(function(){
					$(this).animate({
					    opacity:'1'
					},counter);
					counter = counter + 200;
				});
			}
		});

		$(window).scroll(function(){
			var heightToFix = $('#what-we-do').position().top - $(window).scrollTop();
			if(heightToFix < ($( window ).height() / 2)){
				var counter = 200;
				$('#what-we-do article').each(function(){
					$(this).animate({
					   top:'0',
					    opacity:'1'
					},counter);
					counter = counter + 200;
				});
			}
		});

		$(window).scroll(function(){
			var heightToFix = $('#hse').position().top - $(window).scrollTop();
			if(heightToFix < ($( window ).height() / 2)){
				var counter = 1000;
				$('#hse img').animate({
				    opacity:'1'
				},counter);
			}
		});

		$(window).scroll(function(){
			var heightToFix = $('#our-principles').position().top - $(window).scrollTop();
			if(heightToFix < ($( window ).height() / 2)){
				var counter = 500;
				var x = 1;
				$('#our-principles .row .row').each(function(){
					if(x%2 == 0){
						$(this).animate({
						   right:'0'
						},counter);
					}
					else{
						$(this).animate({
						   left:'0'
						},counter);
					}
					counter = counter + 300;
					x++;
				});
			}
		});

		$("div[id$=leanmodal]").leanModal({ top : 100, overlay : 0.4, closeButton: ".modal_close" });
		$("a[rel*=leanModal]").leanModal();

		$('.modal_close').click(function(){
			$("div[id$=leanmodal]").fadeOut(500);
			$("#lean_overlay").fadeOut(500);
		});

		/*
		var sourceSwap = function () {
	        var $this = $(this);
	        var newSource = $this.data('alt-src');
	        $this.data('alt-src', $this.attr('src'));
	        $this.attr('src', newSource);
	    }

	    $(function() {
	        $('img[data-alt-src]').each(function() { 
	            new Image().src = $(this).data('alt-src'); 
	        }).hover(sourceSwap, sourceSwap); 
	    });
		*/

	    $(function() {
		  $('nav.page-nav ul li a').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top - bdHeight
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});
	});
		
		
</script>
@stop
