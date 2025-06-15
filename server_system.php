<?php

session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   die();
}

require_once 'database.php';
if(isset($_POST['action']) && $_POST['action'] == 'search_train'){
	$from_station = htmlspecialchars($_POST['from_station']);
   $to_station = htmlspecialchars($_POST['to_station']);
   $travel_date = htmlspecialchars($_POST['travel_date']);
   $sql = "SELECT * FROM `train_schedule` s1, `train_details` s2 WHERE s1.train_id = s2.id AND s2.train_route LIKE '%$from_station%' AND s2.train_route LIKE '%$to_station%' AND s1.travel_date = '$travel_date'";
   $result = mysqli_query($conn, $sql);
   $trains = mysqli_fetch_all($result, MYSQLI_ASSOC);

   foreach($trains as $key => $train){
	  //start station and End station
	  $start_statiion = $train['station_start_from'];
	  $end_station = $train['station_end_to'];
	  $sql = "SELECT * FROM `routes` WHERE id = $start_statiion";
	  $result = mysqli_query($conn, $sql);
	  $start_station = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  $trains[$key]['start_station'] = $start_station['name'];
	  $sql = "SELECT * FROM `routes` WHERE id = $end_station";
	  $result = mysqli_query($conn, $sql);
	  $end_station = mysqli_fetch_array($result, MYSQLI_ASSOC);
	  $trains[$key]['end_station'] = $end_station['name'];

   }
   echo json_encode($trains);
   

}

if(isset($_POST['action']) && $_POST['action'] == 'book_ticket'){
	$train_id = htmlspecialchars($_POST['train_id']);
   $seat_type = htmlspecialchars($_POST['seat_type']);
   $seat_number = (int)htmlspecialchars($_POST['num_seats']);
   $from_station = htmlspecialchars($_POST['book_from_station']);
   $to_station = htmlspecialchars($_POST['book_to_station']);
   $total_fare = htmlspecialchars($_POST['total_fare']);

	// if ticket available
	$sql = "SELECT * FROM `train_schedule` WHERE id = $train_id";
	$result = mysqli_query($conn, $sql);
	$train = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$available_seats = json_decode($train['ticket_availablity']);
	if($available_seats->$seat_type < $seat_number){
	  echo json_encode(['status' => 'error', 'message' => 'Seats not available']);
	  die();
	}
	// book ticket
	$temp_data = (int)$available_seats->$seat_type ;
	$available_seats->$seat_type -= $seat_number;
	$seat_number_data = '';
	for ($i=$temp_data; $i > $available_seats->$seat_type; $i--) { 
		$seat_number_data .= $i;
		if($i != $available_seats->$seat_type+1){
			$seat_number_data .= ',';
		}
	}
	$available_seats = json_encode($available_seats);
	$sql = "UPDATE `train_schedule` SET ticket_availablity = '$available_seats' WHERE id = $train_id";
	$result = mysqli_query($conn, $sql);
	$user_id = $_SESSION["user_data"]["id"];
	
	// $sql = "INSERT INTO `tickets` (user_id, train_id, seat_type, ticket_count, seat_number, from_station, to_station, ticket_price) VALUES ($user_id, $train_id, '$seat_type', $seat_number, $seat_number_data, '$from_station', '$to_station', '$total_fare')";

	$sql = "INSERT INTO `tickets` (user_id, train_id, seat_type, ticket_count, seat_number, from_station, to_station, ticket_price) VALUES ($user_id, $train_id, '$seat_type', $seat_number, '$seat_number_data', '$from_station', '$to_station', '$total_fare')";
	$result = mysqli_query($conn, $sql);


   if($result){
	  echo json_encode(['status' => 'success', 'message' => 'Ticket Booked Successfully']);
   }else{
	  echo json_encode(['status' => 'error', 'message' => 'Failed to Book Ticket']);
   }
}

?>