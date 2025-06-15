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
	<title>Buy Your Ticket - Railway Management System</title>
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
		margin-top: 10rem;
	}
	</style>




</head>

<body>
	<?php include 'header.php'; ?>

	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="card-title">
					<h2 class="text-center mt-5">Buy Your Ticket</h2>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<?php if (isset($_SESSION['error'])) { ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $_SESSION['error']; ?>
						</div>
						<?php unset($_SESSION['error']); ?>
						<?php }
							if (isset($_SESSION['success'])) { ?>
						<div class="alert alert-success" role="alert">
							<?php echo $_SESSION['success']; ?>
						</div>
						<?php unset($_SESSION['success']); ?>
						<?php }?>

						<?php
							
							//Get Routes from Databse
							require 'database.php';
							$routes = $conn->query("SELECT * FROM routes");
							$routes = $routes->fetch_all(MYSQLI_ASSOC);
							
							?>
						<form action="server_system.php" method="post" id="train_search_form">
							<input type="hidden" name="action" value="search_train">
							<div class="row">
								<div class="form-group  col-md-6 col-12">
									<label for="from_station">From Station</label>
									<select name="from_station" id="from_station" class="form-control" required>
										<option value="">Select Station</option>
										<?php foreach($routes as $route) { ?>
										<option value="<?php echo $route['id']; ?>"><?php echo $route['name']; ?>
										</option>
										<?php } ?>

									</select>
								</div>

								<div class="form-group col-md-6 col-12">
									<label for="to_station">To Station</label>
									<select name="to_station" id="to_station" class="form-control" required>
										<option value="">Select Station</option>
										<?php foreach($routes as $route) { ?>
										<option value="<?php echo $route['id']; ?>"><?php echo $route['name']; ?>
										</option>
										<?php } ?>

									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="train_name">Travel Date</label>
									<input type="date" name="travel_date" id="travel_date" class="form-control mb-3"
										required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Search</button>

						</form>
					</div>
				</div>

			</div>
		</div>


		<div class="card mt-5">
			<div class="card-header">
				<div class="card-title">
					<h2 class="text-center mt-5">Available Trains</h2>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12 table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Train Name</th>
									<th>From</th>
									<th>To</th>
									<th>Departure</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="train_list">
								<tr>
									<td colspan="5" class="text-center">No Train Found</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="modal fade" id="bookTicketModal" tabindex="-1" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Book Ticket</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<!-- Form for booking ticket -->
									<form id="bookTicketForm">
										<input type="hidden" name="action" value="book_ticket">
										<input type="hidden" name="train_id" id="train_id">
										<input type="hidden" name="book_from_station" id="book_from_station">
										<input type="hidden" name="book_to_station" id="book_to_station">

										<div class="form-group">
											<label for="seat_number">Seat Type</label>
											<select name="seat_type" id="seat_type" class="form-control" required>
												<option value="">Select Seat Type</option>
											</select>
										</div>
										<div class="form-group">
											<label for="seat_number">Number of Seats: <span id="num_seats_label" class="text-muted">1</span></label>
											<input type="range" class="form-range" min="0" max="4" step="1" id="num_seats" name="num_seats">
										</div>

										<div class="form-group">
											Totat Fare: <span id="total_fare" class="text-danger">0</span>
											<input type="hidden" name="total_fare" id="total_fare_input">
										</div>
									</form>
								</div>
								<div class="modal-footer">
									
									<button type="button" class="btn btn-primary" id="confirmBookingBtn" disabled>Confirm
										Booking</button>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>

	</div>


	<script src="assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- FlexSlider -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<script src="assets/js/jquery.simpleselect.min.js"></script>
	<script src="assets/js/aos.js"></script>
	<script src="assets/js/functions.js"></script>
	<script>
		<?php
		require_once 'database.php';

		//get route name
		$sql = "SELECT * FROM `routes`";
		$result = mysqli_query($conn, $sql);
		$routes = mysqli_fetch_all($result, MYSQLI_ASSOC);
		



		?>

		var routesk = <?php echo json_encode($routes); ?>;
		var routes = {};

		$.each(routesk, function(index, value){
			routes[value.id] = value;
			
		});
	</script>
	<script src="assets/js/dashboard.js"></script>

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