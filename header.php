<header>

	<!-- Header Top Part Start -->
	<div class="top-header">
		<div class="site-wrapper clearfix">
			<div class="top-right">
				<ul>
					<?php if (!isset($_SESSION["user"])) { ?>
					<li><a class="fnt-normal" title="Login" href="login.php">Login</a></li>
					<li><a class="fnt-normal" title="Register" href="registration.php">Register</a></li>
					<?php } else { ?>
					<li><a class="fnt-normal" title="Logout" href="logout.php">Logout</a></li>
					<?php } ?>

					<li><a class="fnt-normal" title="Call: 908802" href="tel:908802"><span class="icon-phone"></span>
							908802</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="main-header">

		<!-- Header Start Here -->
		<div class="site-wrapper clearfix">
			<div class="site-logo">
				<a title="RailWayEasy" href="/">
					<img src="assets/images/rerel.svg" alt="RailWayEasy">
				</a>
			</div>
			<nav class="main-navigation RailWayEasy-main-navigation">
				<ul class="nav-list-RailWayEasy">
					<ol>


						<li>
							<a title="Home" href="/" class="train-link">
								<img src="assets/images/home.svg" alt="Train Icon Dark" class="train-icon">Home</a>
						</li>
						<li>
							<a title="All Trains" href="./all_trains.php" class="train-link">
								<img src="assets/images/train-icon.svg" alt="Train Icon Dark" class="train-icon">All
								Trains</a>
						</li>
						<li>
							<a title="Ticket History" href="./ticket_history.php" class="train-link">
								<img src="assets/images/station.svg" alt="Train Icon Dark" class="train-icon">Ticket
								History</a>
						</li>
						<li>
							<a title="Ticket Verify" href="./ticket_verify.php" class="train-link">
								<img src="assets/images/schedule.svg" alt="Train Icon Dark" class="train-icon">Ticket Verify</a>
						</li>
						
						<li>
							<a title="Book Now" href="./dashboard.php" class="train-link">
								<img src="assets/images/ticket.svg" alt="Train Icon Dark" class="train-icon">BookNow</a>
						</li>


					</ol>

				</ul>
			</nav>
			<div class="lang-select">
				<select class="lang-chooser">
					<option selected="selected" value="en">English</option>
					<option value="bn">বাংলা</option>
				</select>
			</div>
		</div>
		<!-- Header End Here -->



	</div>
	<div class="mobile-menu"></div>
</header>