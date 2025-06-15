<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ticket History - Railway Management System</title>
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/owl.theme.default.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/aos.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/learn.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<style>
	.container {
		margin-top: 6rem;
	}
	</style>




</head>

<body>
	<?php include 'header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="text-center mt-5">Ticket History</h2>
				<div class="table-responsive">
					<table class="table  mt-5">
						<thead>
							<tr>
								<th>Ticket no</th>
								<th>Train Name</th>
								<th>From</th>
								<th>To</th>
								<th>Departure</th>
								<th>Price</th>
								<th>Seat Number</th>
								<th>Seat Type</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>


						<?php
                  require_once "database.php";
                  $user_id = $_SESSION["user_data"]["id"];

                  $sql = "SELECT * FROM tickets WHERE user_id = $user_id ORDER BY id DESC";
                  $result = mysqli_query($conn, $sql);
                  while ($ticket = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                     // Get train name Start
                     $train_id = $ticket["train_id"];
                     $sql = "SELECT * FROM train_schedule WHERE id = $train_id";
                     $train_result = mysqli_query($conn, $sql);
                     $train = mysqli_fetch_array($train_result, MYSQLI_ASSOC);
                     $main_train_id = $train["train_id"];
                     $sql = "SELECT * FROM train_details WHERE id = $main_train_id";
                     $main_train_result = mysqli_query($conn, $sql);
                     $main_train = mysqli_fetch_array($main_train_result, MYSQLI_ASSOC);
                     $ticket["train_name"] = $main_train["name"];
                     // Get train name End

                     // Get from station name Start
                     $from_station_id = $ticket["from_station"];
                     $sql = "SELECT * FROM routes WHERE id = $from_station_id";
                     $from_station_result = mysqli_query($conn, $sql);
                     $from_station = mysqli_fetch_array($from_station_result, MYSQLI_ASSOC);
                     $ticket["from_station"] = $from_station["name"];
                     // Get from station name End

                     // Get to station name Start
                     $to_station_id = $ticket["to_station"];
                     $sql = "SELECT * FROM routes WHERE id = $to_station_id";
                     $to_station_result = mysqli_query($conn, $sql);
                     $to_station = mysqli_fetch_array($to_station_result, MYSQLI_ASSOC);
                     $ticket["to_station"] = $to_station["name"];
                     // Get to station name End

                     // Get Departure Start

                     $ticket["departure"] = $train["travel_date"].' '.$main_train["start_time"];

                  ?>
							<tr>
								<td><?php echo $ticket["id"]; ?></td>
								<td><?php echo $ticket["train_name"]; ?></td>
								<td><?php echo $ticket["from_station"]; ?></td>
								<td><?php echo $ticket["to_station"]; ?></td>
								<td><?php echo $ticket["departure"]; ?></td>
								<td><?php echo $ticket["ticket_price"]; ?></td>
								<td><?php echo $ticket["seat_number"]; ?></td>
								<td><?php echo $ticket["seat_type"]; ?></td>
								<?php if (time() > strtotime($ticket["departure"])) { ?>
								<td class="text-warning">Expired</td>
								<?php } else { ?>
								<td class="text-success">Active</td>
								<?php } ?>
							</tr>
							<?php } ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>


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