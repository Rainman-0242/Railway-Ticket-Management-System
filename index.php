<?php
session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta content="charset=utf-8">

	<meta name="author" content="RailWayEasy">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image" content="assets/images/RailWayEasy-Mother-Logo.png">
	<meta property="og:description" content="">
	<meta name="facebook-domain-verification" content="i9xdp4h89027tic8f7n5prw6uqi8sj">
	<meta name="description" content="
                        Tickets, learn, health and more in just one app!
                ">

	<title>
		RailWayEasy

	</title>
	<link rel="shortcut icon" href="rerel.ico" type="image/x-icon">
	<link rel="icon" href="rerel.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/aos.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	
	
	<!-- End Global site tag (gtag.js) - AdWords: 812588262 -->
	<style>
	img.refer-cross-icon {
		position: absolute;
		background: white;
		border-radius: 50%;
		padding: 10px;
		box-sizing: content-box;
		top: -20px;
		right: -20px;
		cursor: pointer;
	}

	.popup-img {
		position: fixed;
		z-index: 999999;
		width: 100%;
		left: 0;
		right: 0;
		background: #00000094;
		text-align: center;
		height: 100vh;
		overflow: hidden;
	}

	.popup-img .banner-container {
		position: relative;
		top: 50px;
		height: 70vh;
		display: inline-block;
	}

	.popup-img .banner-container img.banner-pop {
		height: 100%;
	}

	.popup-img.hide-pop {
		display: none;
	}

	.show-mobile {
		display: none;
	}

	.book-now-button {
		display: inherit;
		padding: 20px 40px;

		background-color: #96089d;
		color: #fff;
		/* White text color */
		text-decoration: none;
		text-align: center;
		border-radius: 10px;
		font-size: 32px;
		border: none;
		cursor: pointer;
		transition: background-color 0.3s;
	}

	/* Change background color on hover */
	.book-now-button:hover {
		background-color: #e2e1e2;
		/* Darker blue color */

	}

	@media all and (max-width: 767px) {
		.show-desktop {
			display: none;
		}

		.show-mobile {
			display: block;
		}

		.popup-img .banner-container img.banner-pop {
			height: auto;
		}

		.popup-img .banner-container {
			top: 50px;
			width: 80%;
			object-fit: cover;
		}

	}

	.hero-image div.slider-content {
		background-image: url(assets/images/banner2.webp);
	}

	.bottomsheet-wrapper {
		position: fixed;
		width: 100%;
		height: auto;
		bottom: 0;
		background: transparent;
		box-shadow: 0 0 5px #CCC;
		padding: 16px 60px 0;
		opacity: 0;
		z-index: 100;
	}

	.bottomsheet-content img {
		max-width: 100%;
		height: auto;
		display: block;
		margin: 0 auto;
	}

	.close-buttomsheet-btn {
		display: block;
		width: 50px;
		height: 46px;
		position: absolute;
		right: 0;
		top: 0;
		color: red;
		font-size: 22px;
		border: 0;
		background-color: transparent;
	}

	.bottomsheet-placeholder {
		height: auto;
		overflow: hidden;
		width: 100%;
	}
	</style>
	<link rel="stylesheet" href="assets/css/learn.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<style>
	.truck-nav:hover .truck-nav-icon-black {
		display: none !important;
	}

	.truck-nav-icon-white {
		display: none;
	}

	.current .truck-nav-icon-white {
		display: inline !important;
	}

	.truck-nav:hover .truck-nav-icon-white {
		display: inline !important;
	}

	@media screen and (max-width: 767px) {
		.truck-nav-icon-white {
			display: inline;
		}

		.truck-nav-icon-black {
			display: none;
		}
	}

	/* train class assets/css */
	.owl-carousel .owl-item {
		padding-right: 8px !important;
	}

	.text-success {
		color: #763c6a;
	}

	.text-danger {
		color: #a94442;
	}

	.text-muted {
		color: #999;
	}

	.text-primary {
		color: #428bca;
	}

	.has-error .help-block,
	.has-error .control-label,
	.has-error .radio,
	.has-error .checkbox,
	.has-error .radio-inline,
	.has-error .checkbox-inline {
		color: #a94442;
		font-size: 12pt;
		margin-bottom: 0px;
	}

	.has-error input,
	.has-error select,
	.has-error textarea {
		border-color: #a94442;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	}

	.has-error input:focus,
	.has-error select:focus,
	.has-error textarea:focus {
		border-color: #843534;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
	}

	.alert {
		padding: 15px;
		margin-bottom: 20px;
		border: 1px solid transparent;
		border-radius: 4px;
	}

	.alert h4 {
		margin-top: 0;
		color: inherit;
	}

	.alert .alert-link {
		font-weight: bold;
	}

	.alert>p,
	.alert>ul {
		margin-bottom: 0;
	}

	.alert>p+p {
		margin-top: 5px;
	}

	.alert-dismissable {
		padding-right: 35px;
	}

	.alert-dismissable .close {
		position: relative;
		top: -2px;
		right: -21px;
		color: inherit;
	}

	.alert-success {
		color: #3c763d;
		background-color: #dff0d8;
		border-color: #d6e9c6;
	}

	.alert-success hr {
		border-top-color: #c9e2b3;
	}

	.alert-success .alert-link {
		color: #34192c;
	}

	.alert-info {
		color: #31708f;
		background-color: #d9edf7;
		border-color: #bce8f1;
	}

	.alert-info hr {
		border-top-color: #a6e1ec;
	}

	.alert-info .alert-link {
		color: #245269;
	}

	.alert-warning {
		color: #8a6d3b;
		background-color: #fcf8e3;
		border-color: #faebcc;
	}

	.alert-warning hr {
		border-top-color: #f7e1b5;
	}

	.alert-warning .alert-link {
		color: #66512c;
	}

	.alert-danger {
		color: #a94442;
		background-color: #f2dede;
		border-color: #ebccd1;
	}

	.alert-danger hr {
		border-top-color: #e4b9c0;
	}

	.alert-danger .alert-link {
		color: #843534;
	}

	.hide {
		display: none !important;
	}

	.user-dropdown-railway {
		position: relative;
	}

	.user-dropdown-railway a i {
		font-size: 12px;
	}

	.user-dropdown-railway a .fa-chevron-up {
		display: none;
	}

	.user-dropdown-railway .user-related-links .single-url a {
		border-bottom: 0 !important;
		display: flex !important;
		align-items: center;
		column-gap: 15px;
		font-family: 'Bw Helder';
		font-style: normal;
		font-weight: 400;
		font-size: 14px !important;
		color: #6E6E6E !important;
		padding: 10px 20px !important;
		height: auto;
	}

	.user-dropdown-railway .user-related-links .single-url a>i {
		flex-basis: 16px;
		font-size: 16px;
		text-align: center;
	}

	.user-dropdown-submenu {
		position: absolute;
		width: 274px;
		height: auto;
		text-align: left;
		top: 100%;
		right: 0;
		display: none;
		background: #FFFFFF;
		box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
		border-radius: 4px;
		z-index: 100;
		padding: 20px 0 0;
	}

	p.drop-title-user {
		font-family: 'Bw Helder';
		font-style: normal;
		font-weight: 500;
		font-size: 20px;
		line-height: 22px;
		color: #001529;
		margin: 0 0 24px;
		padding: 0 20px;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.dropdown-user-info {
		display: flex;
		padding: 0 20px;
		align-items: center;
		font-family: 'Bw Helder';
		font-style: normal;
		font-weight: 400;
		font-size: 14px;
		line-height: 22px;
		color: #6E6E6E;
		column-gap: 15px;
		height: auto;
		margin-bottom: 20px;
	}

	.dropdown-user-info span {
		word-break: break-word;
	}

	.dropdown-user-info i {
		flex-basis: 16px;
		text-align: center;
	}

	.dropdown-user-info i.fa-envelope {
		font-size: 16px;
	}

	.dropdown-user-info i.fa-mobile {
		font-size: 28px;
	}

	.user-dropdown-divider {
		height: 1px;
		background: #CCC;
		margin-bottom: 20px;
	}

	.user-dropdown-submenu .user-related-links .single-url {
		display: block;
		margin-bottom: 20px;
		height: 22px;
	}

	.user-dropdown-submenu .user-related-links .single-url>a:hover,
	.user-dropdown-submenu .user-related-links .single-url>a.current {
		border-bottom-color: transparent !important;
		color: #fff !important;
	}

	.RailWayEasy-main-navigation {
		margin-left: 50px;
		width: calc(100% - 291px);
	}

	ul.nav-list-RailWayEasy {
		display: flex;
		justify-content: space-between;
		width: 100%;
		margin-top: 5px;
	}

	@media (max-width: 991px) {
		.mean-nav ul li ol {
			padding: 0;
		}

		.user-dropdown-submenu {
			width: 100%;
			padding: 20px 0;
		}

		.dropdown-user-info,
		.user-dropdown-railway .user-related-links .single-url a,
		p.drop-title-user {
			padding: 0 5% !important;
		}

		.mean-container .mean-nav ul li.mean-last .railway-logged-user {
			width: 100%;
			color: #FFF !important;
			padding: 1em 10% !important;
			border-left: 0 !important;
			border-bottom: 0 !important;
			border-radius: 0 !important;
			border-top: 1px solid rgba(255, 255, 255, .5) !important;
			background-color: #96089d !important;
		}

		.user-dropdown-railway a .fa-chevron-up,
		.user-dropdown-railway a .fa-chevron-down {
			position: absolute;
			right: 20px;
		}

		.user-dropdown-railway a:hover .fa-chevron-down {
			display: none;
		}

		ul.nav-list-RailWayEasy {
			display: block;
		}
	}

	/* Train Link */
	.train-icon {
		width: 20px;
		position: relative;
		top: -4px;
	}

	.train-link:hover .train-icon {
		display: none;
	}

	.train-link .train-icon-white {
		display: none;
	}

	.train-link:hover .train-icon-white,
	.current .train-icon-white {
		display: inline !important;
	}

	.mean-nav .train-icon {
		display: none !important;
	}

	.mean-nav .train-icon.train-icon-white {
		display: inline !important;
	}
	</style>
</head>

<body>
	


	<!-- Header -->

	<?php include 'header.php'; ?>




	<!-- Slider and site-wrapper part -->
	<!-- Banner and sub-banner -->


	<div class="hero-block hero-image lac-campaign">
		<div class="slider-content">
			<div class="site-wrapper clearfix text-right">
				<div class="title-container">
					<h3 class="banner-title"> �&nbsp;</h3>
					<h2 class="banner-sub-title"> �&nbsp;</h2>
				</div>

			</div>
		</div>
		<div class="block-stats clearfix">
			<div class="site-wrapper clearfix">
				<div class="stats-three">
					<h3>200 Million+</h3>
					Tickets Sold
				</div>
				<div class="stats-three">
					<h3> 498</h3>
					Routes
				</div>
				<div class="stats-three">
					<h3>3 Million+</h3>
					Happy Users
				</div>
			</div>
		</div>
	</div>

	<!-- Service Block - Intro, Booknow button and train types -->

	<div class="container">
		<div class="service-block">
			<div class="site-wrapper clearfix">
				<div class="tab-top-content">
					<a href="./dashboard.php" class="book-now-button">Book Now</a>
					<h2>Introducing you to the RailWayEasy way of life</h2>
					<h5>A one-stop solution for your travel needs</h5>
				</div>

				<div class="service-items">


					<div class="col-one-third">
						<div class="service-item">
							<a href="/launch"><img src="assets/images/CTG.png"
									alt="RailWayEasy Launch">
								<h6>RailWayEasy Business</h6>
							</a>
						</div>
					</div>
					<div class="col-one-third">
						<div class="service-item">
							<a href="/launch"><img src="assets/images/CTG3.png"
									alt="RailWayEasy Launch">
								<h6>RailWayEasy Standard</h6>
							</a>
						</div>
					</div>
					<div class="col-one-third">
						<div class="service-item">
							<a href="/events"><img src="assets/images/CTG2.png"
									alt="RailWayEasy events">
								<h6>RailWayEasy Economy</h6>
							</a>
						</div>
					</div>


				</div>

			</div>

		</div>
	</div>



	<!-- App Block -->
	<div class="app-block">
		<div class="clearfix">
			<div data-aos="fade-down-right" data-aos-duration="2000" class="app-block-left">
				<div class="app-inner-block">
					<h3>Download RailWayEasy App</h3>
					<p>Make convenience a part of your life.</p>
					<a title="Google Play" target="_blank"
						href="https://play.google.com/store/apps/details?id=com.RailWayEasy.rides"
						class="btn-google-store"></a>
					<a title="App Store" target="_blank"
						href="https://itunes.apple.com/us/app/RailWayEasy-rides/id1354321445?ls=1&amp;mt=8"
						class="btn-app-store"></a>
				</div>
			</div>
			<div data-aos="fade-up" data-aos-delay="500" data-aos-duration="2000" class="app-block-center">
				<img alt="banner" src="assets/images/imp.svg" width="200" height="450">
			</div>

		</div>
	</div>





	<!-- Brand Block -->
	<div class="brand-block">
		<div class="site-wrapper clearfix">
			<h2 class="section-title"> </h2>
			<h2 class="section-title"> </h2>
			<h2 class="section-title"> </h2>
			<h2 class="section-title"> </h2>
			<h2 class="section-title"> </h2>
			<h2 class="section-title"> </h2>
			<h2 class="section-title"> </h2>
			<h2 class="section-title">We were featured on</h2>

			<!-- Publisher Media Block -->
			<div class="tab-wrapper clearfix owl-arrow">
				<div class="brand-carousel owl-carousel owl-theme">
					<div class="item">
						<div class="tab-link current" data-tab="tab-1"><img src="assets/images/1.png" alt="BBC"
								title="BBC"></div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-2"><img src="assets/images/2.png" alt="CNBC" title="CNBC">
						</div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-4"><img src="assets/images/4.png" alt="Tech in Asia"
								title="Tech in Asia"></div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-5"><img src="assets/images/5.png" alt="Yahoo News"
								title="Yahoo News"></div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-6"><img src="assets/images/6.png" alt="Techcrunch"
								title="Techcrunch"></div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-7"><img src="assets/images/7.png" alt="Dhaka Tribune"
								title="Dhaka Tribune"></div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-15"><img src="assets/images/8.png" alt="The Daily Star"
								title="The Daily Star"></div>
					</div>
					<div class="item">
						<div class="tab-link" data-tab="tab-16"><img src="assets/images/7.png" alt="Dhaka Tribune"
								title="Dhaka Tribune"></div>
					</div>

					<div class="item">
						<div class="tab-link" data-tab="tab-17"><img src="assets/images/Fintech.png" alt="Fintech"
								title="Fintech"></div>
					</div>
				</div>
			</div>

			<!-- Articles Part             -->
			<div id="tab-1" class="tab-content clearfix current">
				<a href="https://www.youtube.com/watch?v=hPr-Yc92qaY" title="View youtube Content" class="btn-dwn"
					target="_blank">View Full Video</a>
				<h5>Raiyanul Islam Siam @BBC</h5>
				<p>Raiyanul Islam Siam, founder of RailWayEasy, talks about the company's, RailWayEasy, mission at BBC.
				</p>
			</div>

			<div id="tab-2" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="https://www.cnbc.com/video/2018/10/11/founder-of-ride-hailing-app-talks-about-market-in-bangladesh.html"
					target="_blank">View Full Article</a>
				<h5>Founder of ride hailing app talks about market in Bangladesh</h5>
				<p>Raiyanul of RailWayEasy says competition is the "biggest threat" in Bangladesh, but the company is
					working on differentiating itself.</p>
			</div>
			<div id="tab-4" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="https://www.techinasia.com/RailWayEasy-raises-funding-race-bangladeshs-super-app"
					target="_blank">View Full Article</a>
				<h5>Bangladeshi ride-hailer RailWayEasy raises $15m</h5>
				<p>RailWayEasy, a Bangladesh-based online ticketing platform, announced today that it has raised US$15
					million pre-series B investment. Whether you're planning a short commute or a long-distance journey,
					EasyRail has you covered. Our platform offers a comprehensive selection of train routes, ensuring
					that you can find the perfect option to suit your travel needs. From express trains to local
					services, we provide access to a diverse range of routes, making it easy for you to reach your
					destination efficiently and comfortably..</p>
			</div>
			<div id="tab-5" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="https://sg.news.yahoo.com/bangladesh-ride-sharing-bust-ticket-booking-app-RailWayEasy-041831077.html"
					target="_blank">View Full Article</a>
				<h5>Bangladesh’s bust ticket booking app RailWayEasy raises funding</h5>
				<p>With EasyRail, you no longer have to worry about last-minute disappointments due to sold-out tickets.
					Our platform provides real-time updates on seat availability, allowing you to plan your journey with
					confidence. Whether you're booking in advance or at the eleventh hour, you can trust EasyRail to
					keep you informed and ensure that you secure your seats without any hassle.</p>
			</div>

			<div id="tab-6" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn" href="https://techcrunch.com/2018/09/23/RailWayEasy/"
					target="_blank">View Full Article</a>
				<h5>BookTicket-hailing startup RailWayEasy raises $15M to build the Grab of Bangladesh</h5>
				<p>RailWayEasy — which means ‘easy’ in Bengali — started in 2014 offering online bus ticket sales before
					expanding into other tickets like ferries. The startup moved into on-demand services in January when
					it added motorbikes and then it recently introduced private cars. </p>
			</div>
			<div id="tab-7" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="https://www.dhakatribune.com/feature/2019/05/12/RailWayEasy-can-potentially-be-the-largest-digital-company-coming-out-of-bangladesh"
					target="_blank">View Full Article</a>
				<h5>RailWayEasy can potentially be the largest digital company coming out of Bangladesh</h5>
				<p>Last month RailWayEasy welcomed Ravi Garikipati - of Flipkart fame - to its board. RailWayEasy, the
					five-year old digital ticketing company, has expanded its business from ticketing to ride sharing
					and most recently to food delivery.</p>
			</div>

			<div id="tab-15" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="https://www.thedailystar.net/business/the-daily-star-ict-awards-2018-win-one-individual-4-it-firms-1661899"
					target="_blank">View Full Article</a>
				<h5>Acclaim for ICT feats</h5>
				<p>Bangladesh should be branded as an emerging ICT destination as opposed to being marketed as a place
					with the cheapest labour, speakers said at the third The Daily Star ICT Awards ceremony yesterday.
				</p>
			</div>
			<div id="tab-16" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="https://www.dhakatribune.com/business/2018/10/11/RailWayEasy-will-deliver-any-necessary-service-you-can-imagine"
					target="_blank">View Full Article</a>
				<h5>‘RailWayEasy will deliver any necessary service you can imagine’</h5>
				<p>Her company RailWayEasy recently received a $15 million investment from Singapore-based venture
					capital firm Golden Gate Ventures. In conversation with Dhaka Tribune's Niaz Mahmud, RailWayEasy
					founder shared her priotised areas for plan in going forward.</p>
			</div>
			<div id="tab-17" class="tab-content clearfix">
				<a title="View Full Article" class="btn-dwn"
					href="http://www.fintechbd.com/acquiring-funds-still-remain-a-big-struggle-for-bangladeshi-companies/"
					target="_blank">View Full Article</a>
				<h5>‘ACQUIRING FUNDS STILL REMAIN A BIG STRUGGLE FOR BANGLADESHI COMPANIES’</h5>
				<p>In the last two years or so, RailWayEasy has been able to install a ubiquitous presence in Dhaka. You
					would see their green-black spiralling logo strangely on small signboards hung on the gates of
					buildings and apartments saying “Don’t park here.”</p>
			</div>

			<!-- Tab Block -->
		</div>
	</div>



	<div class="partners-block owl-arrow">
		<div class="site-wrapper clearfix">
			<h2 class="section-title">Our Trusted Partners</h2>
			<div class="owl-carousel owl-theme partners-carousel">
				<div class="item"><img src="assets/images/SR-travels-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Hanif-AC-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Ena-transport-prvt-Ltd-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/nabil-paribahan-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/green-line-paribahan-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Saintmartin-Hyunday-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Soudia-coach-services-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Akota-transport-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/tungipara-express-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/MANIK-EXPRESS-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Al-Hamra-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Saint-martin-travels-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Agomoni-express-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Orin-travels-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/royal-Coach-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Shohag-paribahan-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Emad-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/SP-Golden-Line-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Star-Line-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Diganta-Paribahan-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/SHAMIM-Enterprise-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Barkat-Travels-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/HAQUE-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/M.R.-Enterprise-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Sagorika-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Tuba-line-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Unity-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Sheba-Green-Line-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/KANAK-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Tanzila-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Khaja-Travels-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Saintmartin-2020-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Chakladar-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/green-line-paribahan-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Purabi-Paribahan-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/Green-Express-208x78.png" alt="RailWayEasy"></div>
				<div class="item"><img src="assets/images/shah-ali-paribahan.jpg" alt="RailWayEasy"
						style="height: 78px;"></div>
			</div>
		</div>
	</div>


	<!-- Footer Block -->
	<footer>
		<div class="big-footer">
			<div class="site-wrapper clearfix">
				<div class="block-one-big">
					<a title="RailWayEasy" href="/"><img src="assets/images/rerel.svg"
							alt="RailWayEasy"></a>
					<div class="block-description">
						<p>RailWayEasy, owned and operated by Siam Limited, is Bangladesh’s largest online ticket
							destination, which is committed to making your life convenient, easier and smarter.</p>
						<small class="footer-copyright">© 2015-2024 RailWayEasy · All Rights Reserved </small>
					</div>
				</div>
				<div class="block-three block-four footer-list">
					<ul>
						<li><a href="/about-us/en">About Us</a></li>
						<li><a href="/contact-us/en">Contact Us</a></li>
						<li><a href="/terms-of-use/en">Terms of Use</a></li>
						<li><a href="/privacy-policy/en">Privacy Policy</a></li>
					</ul>
				</div>
				<div class="block-one block-four footer-list">
					<h3 class="block-title" style="text-transform: none">Services</h3>
					<ul>
						<li><a href="https://train.RailWayEasy.com">Train Tickets</a></li>
					</ul>
				</div>
                <div class="block-two block-four social-media">
				<h3 class="block-title" style="text-transform: none">Social</h3>
				<ul>
					<li><a target="_blank" href="//facebook.com/RailWayEasy"><img src="assets/images/fb.svg"
								alt="RailWayEasy"></a></li>
					<li><a target="_blank" href="//www.instagram.com/RailWayEasy.bd/"><img src="assets/images/ins.svg"
								alt="RailWayEasy"></a></li>
					<li><a target="_blank" href="//www.linkedin.com/company/RailWayEasy/"><img
								src="assets/images/in.svg" alt="RailWayEasy"></a></li>
				</ul>
			</div>

			</div>
			
			<div class="block-one-big mobile-view-footer">
				<div class="block-description">
					<small>© 2015-2024 RailWayEasy · All Rights Reserved </small>
				</div>
			</div>
		</div>
		</div>
	</footer>




	<script src="assets/js/jquery.min.js"></script>
	<!-- FlexSlider -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<script src="assets/js/jquery.simpleselect.min.js"></script>
	<script src="assets/js/aos.js"></script>
	<script src="assets/js/functions.js"></script>

	<script type="text/javascript">
	$(function() {
		$(".lang-chooser").on('change', function() {


			var base_url = window.location.origin;
			var regex = /\?lang=(en|bn)$/g;
			var captureLangTerm = regex.exec(window.location.href);

			if (captureLangTerm) {
				return window.location.replace(base_url + '?lang=' + $(this).val());
			} else {
				var lastOccrPattern = /\/(en|bn)$/;
				var captureLast = lastOccrPattern.exec(window.location.href);

				if (captureLast) {
					var url = window.location.href;
					url = url.replace(/\/[^\/]*$/, '/' + $(this).val());
					return window.location.replace(url);
				} else {
					var pathName = window.location.href.replace(/^.*\/|\.[^.]*$/g, '');

					if (!pathName) {
						return window.location.replace(base_url + '?lang=' + $(this).val());
					}

					return window.location.replace(window.location.href);
				}
			}
		});
	})
	</script>

	<script type="text/javascript">
	// Setting initial height of main_wrapper
	$("document").ready(function() {
		function setMainWrapperHeight() {
			var browserHeight = $(window).height();
			var headerHeight = $("header.new-header").height();
			var mainWrapperHeight = $("#main_wrapper").height();
			var footerHeight = $("footer.footer").height();

			var documentHeight = headerHeight + mainWrapperHeight + footerHeight;

			if (documentHeight < browserHeight) {
				var mainWrapperHeight = browserHeight - (headerHeight + footerHeight + 25);
				$("#main_wrapper").css('min-height', mainWrapperHeight);
			}
		}

		// Initial
		setMainWrapperHeight();
		$("footer.footer").css('visibility', 'visible');

		// On resize
		$(window).resize(function() {
			setMainWrapperHeight();
		});

		// Logout request
		$("a[title='Logout']").click(function(e) {
			e.preventDefault();
			$('form#logout-form').submit();
		});



		$("a[data-modal-target='terms'], button[data-modal-target='terms']").on('click', function(e) {
			e.preventDefault();
			$("#terms-modal").show();
		});

		$("button[data-modal-target='railwayact']").on('click', function(e) {
			e.preventDefault();
			$("#railway-act-modal").show();
		});

		$("a[data-modal-target='privacy'], button[data-modal-target='privacy']").on('click', function(e) {
			e.preventDefault();
			$("#privacy-modal").show();
		});

		$("a[data-modal-target='refund'], button[data-modal-target='refund']").on('click', function(e) {
			e.preventDefault();
			$("#refund-modal").show();
		});

		// User dropdown
		var userDropdownOpened = false;
		$(document).on('click', function(e) {
			if ($(e.target).closest(".user-dropdown-railway").length === 0) {
				$(".user-dropdown-submenu").slideUp();
				$(".user-dropdown-railway a .fa-chevron-up").hide();
				$(".user-dropdown-railway a .fa-chevron-down").show();
				userDropdownOpened = false;
			} else if ($(e.target).closest(".railway-logged-user").length === 1) {
				if (userDropdownOpened) {
					$(".user-dropdown-submenu").slideUp();
					$(".user-dropdown-railway a .fa-chevron-up").hide();
					$(".user-dropdown-railway a .fa-chevron-down").show();
					userDropdownOpened = false;
				} else {
					$(".user-dropdown-submenu").slideDown();
					$(".user-dropdown-railway a .fa-chevron-up").show();
					$(".user-dropdown-railway a .fa-chevron-down").hide();
					userDropdownOpened = true;
				}
				return;
			}
		});
	});
	</script>
	<script>
	setTimeout(function() {
		$(function() {
			var slideDuration = 1000;
			var bottomSheetHeight = $(".bottomsheet-wrapper").height() + 16;
			$(".bottomsheet-wrapper").css({
				'bottom': '-' + bottomSheetHeight + 'px',
				'opacity': '1'
			});
			$(".bottomsheet-wrapper").animate({
				bottom: '0',
			}, slideDuration);

			$('.bottomsheet-placeholder').animate({
				height: bottomSheetHeight + 'px'
			}, slideDuration);

			$(".close-buttomsheet-btn").on('click', function() {
				$(".bottomsheet-wrapper").animate({
					bottom: '-' + bottomSheetHeight + 'px',
				}, slideDuration);

				$('.bottomsheet-placeholder').animate({
					height: '0'
				}, slideDuration);

			});
		});
	}, 2000);

	$(function() {
		if (false) {
			if (document.cookie.indexOf('refPop=false') < 0) {
				$('.popup-img.hide-pop').removeClass('hide-pop');
				document.cookie = "refPop=false";
			}

			$('.refer-cross-icon').click(function() {
				$('.popup-img').addClass('hide-pop');
			})
		}

		$('.alert-danger').fadeTo(5 * 1000, 500).slideUp(500, function() {
			$('.alert-danger').remove();
		});
	});
	</script>


</body>

</html>