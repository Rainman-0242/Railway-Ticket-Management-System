$(document).ready(function(){


	var train_search_form = $('#train_search_form');

	train_search_form.submit(function(e){
		e.preventDefault();

		var data = train_search_form.serialize();
		$.ajax({
			url: train_search_form.attr('action'),
			type: 'POST',
			data: data,
			success: function(response){
				var data = JSON.parse(response);
				var fromStation = $('#from_station').val();
				var toStation = $('#to_station').val();
				console.log(data);
				var table = $('#train_list');
				if(data.length > 0){
					table.html('');
					$.each(data, function(index, value){
						var row = '<tr>';
						row += '<td>'+value.name+'</td>';
						row += '<td>'+value.start_station+'</td>';
						row += '<td>'+value.end_station+'</td>';
						row += '<td>'+value.travel_date+' '+value.start_time+'</td>';
						
						row += '<td><a href="javascript:void(0)" class="btn btn-primary book_ticket" data-train_id="'+value.id+'" data-train_name="'+value.name+'" data-train-seat-type=\''+value.seat_fares+'\' data-train-ticket-availablity=\''+value.ticket_availablity+'\' data-from-station="'+fromStation+'" data-to-station="'+toStation+'">Book Ticket</a></td>';
						row += '</tr>';
						table.append(row);
					});
				}
			},

			error: function(response){
				console.log(response);
			}
		});
	});
});

$(document).ready(function(){
  $(document).on('click', '.book_ticket', function(){
    var trainId = $(this).data('train_id');
	var trainName = $(this).data('train_name');
	var ticketAvailablity = $(this).data('train-ticket-availablity');
	var fromStation = $(this).data('from-station');
	var toStation = $(this).data('to-station');
	var seatFare = $(this).data('train-seat-type');
   
    $('#exampleModalLabel').text('Book Ticket for ' + trainName);
	$('#train_id').val(trainId);

	var seatType = $(this).data('train-seat-type');
	var seatTypeSelect = $('#seat_type');

	seatTypeSelect.html('');
	seatTypeSelect.append('<option value="">Select Seat Type</option>');
	$.each(ticketAvailablity, function(index, value){
		seatTypeSelect.append('<option value="'+index+'">'+index+'</option>');
	});

	$('#book_from_station').val(fromStation);
	$('#book_to_station').val(toStation);
	var seatnum = $('#num_seats');
	var countSeat = $('#num_seats_label');
	seatnum.val(0);
	countSeat.text(0);
	$('#total_fare').text(0);
	$('#total_fare_input').val(0);

	seatTypeSelect.change(function(){
		if(seatTypeSelect.val() != ''){
		console.log(ticketAvailablity[seatTypeSelect.val()]);
		seatnum.val(0);
		countSeat.text(0);
		if(ticketAvailablity[seatTypeSelect.val()] < 1){
			$('#confirmBookingBtn').prop('disabled', true);
		} else if(ticketAvailablity[seatTypeSelect.val()] > 4){
			console.log('max 4');
			seatnum.attr('max', 4);
		
		} else {
			seatnum.attr('max', ticketAvailablity[seatTypeSelect.val()]);
		}
		} else {
			
		}
	});
	seatnum.change(function(){
		countSeat.text(seatnum.val());
		if(seatTypeSelect.val() != ''){
			var seatfare_main = seatFare[seatTypeSelect.val()];
			var distance_fare = routes[toStation].fare_from_dhaka - routes[fromStation].fare_from_dhaka;
			var total_fare = (seatfare_main + distance_fare)*seatnum.val();
			if(total_fare < 0){
				total_fare = (seatfare_main - distance_fare)*seatnum.val();
			}
			$('#total_fare').text(total_fare);
			$('#total_fare_input').val(total_fare);
			if(seatnum.val() > 0){
				$('#confirmBookingBtn').prop('disabled', false);
			} else {
				$('#confirmBookingBtn').prop('disabled', true);
			}
		} else {
			$('#confirmBookingBtn').prop('disabled', true);
		}
	});

	


    
    $('#bookTicketModal').modal('show');
  });

  $('#confirmBookingBtn').click(function(){
	var data = $('#bookTicketForm').serialize();
	$.ajax({
	  url: 'server_system.php',
	  type: 'POST',
	  data: data,
	  success: function(response){
		var data = JSON.parse(response);
		if(data.status == 'success'){
		  $('#bookTicketModal').modal('hide');
		  alert('Ticket booked successfully');
		} else {
		  alert('Failed to book ticket');
		}
	  },
	  error: function(response){
		console.log(response);
	  }
	});
  });
});
