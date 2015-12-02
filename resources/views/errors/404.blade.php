<!DOCTYPE HTML>
<html>
	<head>
		<title>404 Page not found | Talal Trading &#38; Contracting Co.</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url('/assets/css/main.css')}}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		@yield('style')
		@yield('meta')
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header" class="master">

					<!-- Inner -->
						<div class="inner">
							<header id="logo-img-xfp">
								<h1><span>Talal Trading &#38; Contracting</span><a href="{{url('/')}}" id="logo"><img src="/images/talal-logo.png" alt="Talal Logo"></a></h1>
								<p>Talal Trading &#38; Contracting</p>
							</header>
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

			<!-- Main -->

				<div class="wrapper">
					<article class="container special" id="about-us">
						<header><h2>YOU'RE DEFINITELY LOST..</h2></header>
						<p><img src="/images/pic01.jpg" alt="Walid Abdulkader Photo" class="inline-photo"><span class="quote"></span>I would like to take this opportunity to introduce Talal Trading &#38; Contracting Company Co. (Talal) as our esteemed organization. Established in 1991, TALAL's main activities include civil and building construction, infrastructure and maintenance works. Until 1994, Talal kept a moderate scale of projects and work force. Since then, the company has grown rapidly and has become one of the leading Construction Companies in its classification. TALAL is classified by the Central Tenders Committee as a Grade A building construction contractor.</p>
						<p>
						With the help of a team of professionals experienced in the fields of Management, Construction, Engineering, Planning, Health &#38; Safety, Quality Assurance &#38; Quality Control and Administration, Talal has maintained an excellent record of delivering high quality Projects in time and within budget.</p>
						<p>
						In TALAL we consider Clients and their Consultants as partners and work closely with them to complete and deliver Project in a professional manner and to the satisfaction of all parties.</p>
						<p class="author">Walid Abdulkader</p>
						<p class="author-position">General Manager</p>
					</article>
				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">

							<!-- about us -->
								<section class="3u 6u(narrow) full-mobile" id="footer-about">
									<h4 class="clearfix"><img src="{{url('images/talal-logo.png')}}"/>Talal Trading &amp; Contracting Co.</h4>
									<div>
									<p> the company has grown rapidly and has become one of the leading Construction Companies in its classification. TALAL is classified by the Central Tenders Committee as a Grade A building construction contractor.</p>
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
									<li>&copy; Untitled. All rights reserved.</li><li>Developer: <a href="#">Botlax</a></li>
								</ul>
							</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="{{url('assets/js/jquery.min.js')}}"></script>
			<script src="{{url('assets/js/modernizr.custom.js')}}"></script>
			<script src="{{url('assets/js/jquery.dropotron.min.js')}}"></script>
			<script src="{{url('assets/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{url('assets/js/jquery.onvisible.min.js')}}"></script>
			<script src="{{url('assets/js/skel.min.js')}}"></script>
			<script src="{{url('assets/js/util.js')}}"></script>
			<!--[if lte IE 8]><script src="{{url('assets/js/ie/respond.min.js')}}"></script><![endif]-->
			<script src="{{url('assets/js/main.js')}}"></script>
			
			@yield('script')
	</body>
</html>