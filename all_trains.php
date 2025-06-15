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
	<title>All Trains - Railway Management System</title>
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
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="text-center mt-5">All Trian List</h2>
				<div class="row m-2">
					<input type="text" class="form-control" id="station_search" placeholder="Train Search">
				</div>
				<div class="table-responsive">
					<table class="table  mt-5">
						<thead>
							<tr>
								<th>Train Name</th>
								<th>From</th>
								<th>To</th>
								<th>Departure</th>
								<th>Stations</th>
								<th>Seat Types</th>
								<th>Active Days</th>
							</tr>
						</thead>
						<tbody id="train_list">
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"
		integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- FlexSlider -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<script src="assets/js/jquery.simpleselect.min.js"></script>
	<script src="assets/js/aos.js"></script>
	<script src="assets/js/functions.js"></script>
	<script>
		<?php
		require_once 'database.php';
		$sql = "SELECT * FROM `train_details`";
		$result = mysqli_query($conn, $sql);
		$trains = mysqli_fetch_all($result, MYSQLI_ASSOC);

		//get route name
		$sql = "SELECT * FROM `routes`";
		$result = mysqli_query($conn, $sql);
		$routes = mysqli_fetch_all($result, MYSQLI_ASSOC);
		



		?>

		var trains = <?php echo json_encode($trains); ?>;
		var routesk = <?php echo json_encode($routes); ?>;
		var routes = {};

		$.each(routesk, function(index, value){
			routes[value.id] = value;
			
		});
	</script>
	<script src="assets/js/all_trains.js"></script>

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