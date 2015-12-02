<!DOCTYPE HTML>

<html>
	<head>
		<title>Home | Talal Trading &#38; Contracting Co.</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Talal is one of the leading Construction Companies in Qatar and is classified by the Central Tenders Committee as a Grade A building construction contractor." />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" 
	      type="image/png" 
	      href="{{url('images/fav.png')}}">

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><span>Talal Trading &#38; Contracting</span><a href="{{url('/')}}" id="logo"><img src="/images/talal-logo.png" alt="Talal Logo"></a></h1>
								<hr />
								<p>Talal Trading &#38; Contracting Co.</p>
							</header>
							<footer>
								<a href="#banner" class="button circled scrolly">Start</a>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li>
									<a href="{{url('/about-us')}}">About Us</a>
								</li>
								<li>
									<a href="{{url('/projects')}}">Projects</a>
								</li>
								<li><a href="{{url('/careers')}}">Careers</a></li>
								<li><a href="{{url('/contact-us')}}">Contact Us</a></li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
				<section id="banner">
					<header>
						<h2>We take pride in our work.</h2>
						<p>
							View some of our recent projects over the past decade.
						</p>
					</header>
				</section>

			<!-- Carousel -->
				<section class="carousel">
					<div class="reel">
						@foreach($projects as $project)
						<article>
							<a href="{{url('/projects/'.$project->name_link)}}" class="image featured" alt="{{$project->name}}"><img src="images/featured-{{$project->id}}.jpg" alt="" /></a>
							<header>
								<h3><a href="{{url('/projects/'.$project->name_link)}}">{{$project->name}}</a></h3>
							</header>
						</article>
						@endforeach
					</div>
				</section>

			<!-- Main -->
		
			<!-- Features -->
				<div class="wrapper indipendent">

					<section id="mission-vision" class="container">
						
						<div class="row">
							<section class="8u 12u(mobile) indi-left">
								<h3>Vision</h3>
								<p>
									&#34;To become a leading Qatari Contractor known for its Superior Quality, Excellent Service and combining local values with International Standards&#34;
								</p>
								<h3>Mission</h3>
								<p>
									&#34;To be a highly successful Contractor with achievements built on superior quality, excellent service, high caliber staff and selective international tie-ups&#34;
								</p>
							</section>
							<aside class="4u 12u(mobile) aside-right block-link">
								<a href="#"><i class="fa fa-download"></i>&nbsp; Company Profile</a>
								<a href="{{url('contact-us')}}"><i class="fa fa-phone"></i>&nbsp; Contact Us</a>
							</aside>
						</div>
					</section>
				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">

							<!-- about us -->
								<section class="3u 6u(narrow) full-mobile" id="footer-about">
									<a href="{{url()}}"><h4 class="clearfix"><img src="{{url('images/talal-logo.png')}}"/>Talal Trading &amp; Contracting Co.</h4></a>
									<div>
									<a href="{{url('about-us')}}">
									<p> The company has grown rapidly and has become one of the leading Construction Companies in its classification. TALAL is classified by the Central Tenders Committee as a Grade A building construction contractor.</p>
									</a>
									</div>
								</section>

							<!-- Navigation -->
								<section class="2u 6u(narrow) full-mobile" id="footer-nav">
									<h4>Navigation</h4>
									<div>
										<ul>
											<li>
												<a href="{{url('/about-us')}}">About Us</a>
											</li>
											<li>
												<a href="{{url('/projects')}}">Projects</a>
											</li>
											<li><a href="{{url('/careers')}}">Careers</a></li>
											<li><a href="{{url('/contact-us')}}">Contact Us</a></li>
										</ul>
									</div>
								</section>

							<!-- Recent Projects -->
								<section class="4u 6u(narrow) full-mobile" id="footer-project">
									<h4>Recent Projects</h4>
									<div>
										<ul>
											@foreach($projects2 as $project)
												<li class="clearfix"><img src="{{url('images/featured-'.$project->id.'.jpg')}}"/><a href="{{url('/projects/'.$project->name_link)}}">{{$project->name}}</a></li>
											@endforeach
										</ul>
									</div>
								</section>

							<!-- Countact us -->
								<section class="3u 6u(narrow) full-mobile address">
									<h4>Contact Us</h4>
									<div class="address">
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

						</div>
						<hr />
						<!-- Copyright -->
							<div class="copyright">
								<ul class="menu">
									<li>&copy; {{date('Y')}} Talal Trading &amp; Contracting Co. All rights reserved.</li><li>Developer: <a href="#">Botlax</a></li>
								</ul>
							</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>