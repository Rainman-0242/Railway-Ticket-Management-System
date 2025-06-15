<?php
session_start();
require_once 'database.php';
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
		<div class="row d-flex">
			<div class="col-12 col-md-6">
				<h2 class="text-center mt-5">Verify Ticket</h2>
				<div class="row">
					<form action="ticket_verify.php" method="post">
						<div class="col-12 col-md-12">
							<div class="form-group">
								<label for="ticket_no">Ticket No</label>
								<input type="text" class="form-control" id="ticket_no" name="ticket_no" required>
							</div>
							
						</div>
						<div class="col-12 col-md-12">
							<button type="submit" class="btn btn-primary mt-4">Verify</button>
						</div>
					</form>
				</div>
				
			</div>
			<div class="col-12 col-md-6 mt-5">
				<?php
				if (isset($_POST['ticket_no'])) {
					$ticket_no = $_POST['ticket_no'];
					$ticket_no = mysqli_real_escape_string($conn, $ticket_no);
					$sql = "SELECT * FROM tickets WHERE id = '$ticket_no'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						$train_schedule_id = $row['train_id'];
						$sql = "SELECT * FROM train_schedule WHERE id = '$train_schedule_id'";
						$train_schedule_data = mysqli_query($conn, $sql);
						$train_schedule = mysqli_fetch_assoc($train_schedule_data);

						$main_train_id = $train_schedule['train_id'];
						$sql = "SELECT * FROM train_details WHERE id = '$main_train_id'";
						$main_train_data = mysqli_query($conn, $sql);
						$main_train = mysqli_fetch_assoc($main_train_data);

						$ticket_from = $row['from_station'];
						$ticket_to = $row['to_station'];

						$sql = "SELECT * FROM routes WHERE id = '$ticket_from'";
						$from_data = mysqli_query($conn, $sql);
						$from = mysqli_fetch_assoc($from_data);

						$sql = "SELECT * FROM routes WHERE id = '$ticket_to'";
						$to_data = mysqli_query($conn, $sql);
						$to = mysqli_fetch_assoc($to_data);

						$user_id = $row['user_id'];
						$sql = "SELECT * FROM users WHERE id = '$user_id'";
						$user_data = mysqli_query($conn, $sql);
						$user = mysqli_fetch_assoc($user_data);



						?>
						
						<div class="row d-inline-flex">
							<h3 class="text-center mt-5">Ticket Details</h3>
							<span class="col-12 col-md-6 ">User Full Name: <span class="text-primary"><?php echo $user['name']; ?></span></span>
							<span class="col-12 col-md-6">Ticket No: <span class="text-danger">#<?php echo $row['id']; ?></span></span>
							<span class="col-12 col-md-6">Train Name: <span class="text-warning"><?php echo $main_train['name']; ?></span></span>
							<span class="col-12 col-md-6">From: <?php echo $from['name']; ?></span>
							<span class="col-12 col-md-6">To: <?php echo $to['name']; ?></span>
							<span class="col-12 col-md-6">Seat Numbers: <?php echo $row['seat_number']; ?></span>
							
						</div>
						<?php
					} else {
						echo "<h3 class='text-center mt-5'>No ticket found</h3>";
					}
				}
				?>
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