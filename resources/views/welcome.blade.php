<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{env('APP_NAME')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="themes/html5up-stellar/assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="themes/html5up-stellar/assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="themes/html5up-stellar/assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="themes/html5up-stellar/assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="img/logo.png" alt="" /></span>
						<h1>{{env('APP_NAME')}}</h1>
						<p>Fast For A Foodie💯</a>.</p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">First Section</a></li>
							<li><a href="#second">Second Section</a></li>
							<li><a href="#cta">Get Started</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Who Are We?</h2>
										</header>
										<p>
                      At Fast Foodie, we pride ourselves to instill the best quality of delivery. When it comes to working at the job and you don’t have the time to leave to get lunch. Or just coming home from a long day from work, and completely forgot to stock up on groceries.
                      Why not have us do the hard work, and have a piece of mind that waiting in line to get what you need will be a thing of the past.
                    </p>
										<ul class="actions">
											<li><a href="{{url('/about')}}" class="button">Learn More</a></li>
										</ul>
									</div>
									<span class="image"><img src="img/logo-spoon.png" alt="" /></span>
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Guidelines</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon major style1 fa-code"></span>
										<h3>Ipsum consequat</h3>
										<p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
									</li>
									<li>
										<span class="icon major style3 fa-copy"></span>
										<h3>Amed sed feugiat</h3>
										<p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
									</li>
									<li>
										<span class="icon major style5 fa-diamond"></span>
										<h3>Dolor nullam</h3>
										<p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
									</li>
								</ul>
								<footer class="major">
									<ul class="actions">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>

						<!-- Second Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2>Connectivity</h2>
									<p>Just a few stats for you!</p>
								</header>
								<ul class="statistics">
									<li class="style1">
										<span class="icon fa fa-cutlery"></span>
										<strong>{{\App\User::all()->count()}}</strong> Customers served
									</li>
									<li class="style2">
										<span class="icon fa fa-comments"></span>
										<strong>{{\App\Review::all()->count()}}</strong> Foodie Reviews
									</li>
									<li class="style3">
										<span class="icon fa fa-clock-o"></span>
										<strong>30 mins - 1 hour</strong> ETA
									</li>
									<li class="style4">
										<span class="icon fa fa-users"></span>
										<strong>{{\App\User::all()->count()}}</strong> Users
									</li>
									<li class="style5">
										<span class="icon fa fa-user"></span>
										<strong>{{\App\User::all()->count()}}</strong> Foodies
									</li>
								</ul>
								<p class="content">
									We always stay in touch with our customers and their needs.
									Making sure we give impeccable service, and how our company is perceived.
									Fast Foodie takes full responsibility for: checking all food orders, accuracy and completeness while at the restaurant.
									Selecting the most efficient route to the customer for a timely delivery. Handling of food containers to ensure highest food quality.
									Fostering positive customer relations with businesses, restaurants, stores, and customers.
									We love to hear your experience, and why you chose Fast Foodie.
								</p>
								<footer class="major">
									<ul class="actions">
										<li><a href="{{url('/register')}}" class="button">Sign Up Now</a></li>
									</ul>
								</footer>
							</section>

						<!-- Get Started -->
							<section id="cta" class="main special">
								<header class="major">
									<h2>Register</h2>
									<p>
										When food is deliveried quickly and neatly, It warms the soul.
										Fast Foodies would say 'Once I have my food, my problems are solved'.</p>
								</header>
								<footer class="major">
									<ul class="actions">
										<li><a href="{{url('/register')}}" class="button special">Get Started</a></li>
										<li><a href="{{url('/how-does-it-work')}}" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<h2>Aliquam sed mauris</h2>
							<p>
								Fast Foodie is Atlanta's very own local online food delivery service.
								We pride ourselves to instill the best quality of delivery.
								Our customers love our service for the time it helps them save, as well as for our high standard of customer service. We have a professional support team that is dedicated to help you in any situation that you're in. A great way to explore new restaurants, and know the restaurants that people love to eat at. When it comes to working on the job, and you don't have the time to leave for lunch. Coming home from a long day of work, and completely forgot to stock up on groceries. 
								Have a piece of mind knowing that it's been handled, and it's on the way.
							</p>
							<ul class="actions">
								<li><a href="generic.html" class="button">Learn More</a></li>
							</ul>
						</section>
						<section>
							<h2>Etiam feugiat</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
								<dt>Phone</dt>
								<dd>(000) 000-0000 x 0000</dd>
								<dt>Email</dt>
								<dd><a href="#">information@untitled.tld</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
							</ul>
						</section>
						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="themes/html5up-stellar/assets/js/jquery.min.js"></script>
			<script src="themes/html5up-stellar/assets/js/jquery.scrollex.min.js"></script>
			<script src="themes/html5up-stellar/assets/js/jquery.scrolly.min.js"></script>
			<script src="themes/html5up-stellar/assets/js/skel.min.js"></script>
			<script src="themes/html5up-stellar/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="themes/html5up-stellar/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="themes/html5up-stellar/assets/js/main.js"></script>

	</body>
</html>
