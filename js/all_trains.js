$(document).on('ready', function(){
	var table = $('#train_list');
	var train_data = trains;

	$.each(train_data, function(index, value){
		var row = '<tr id="'+value.id+'" data-train-name="'+value.name.toLowerCase()+'">';
		row += '<td>'+value.name+'</td>';
		row += '<td>'+routes[value.station_start_from].name+'</td>';
		console.log(value.station_end_to, routes[value.station_end_to]);
		row += '<td>'+routes[value.station_end_to].name+'</td>';
		row += '<td>'+value.start_time+'</td>';
		var station = JSON.parse(value.train_route);
		var station_name = '';
		$.each(station, function(index, value){
			station_name += routes[value].name;
			if(index < station.length-1){
				station_name += ' -> ';
			}
		});
		row += '<td>'+station_name+'</td>';
		var seat_type = JSON.parse(value.seat_fares);
		var seat_type_name = '';
		$.each(seat_type, function(index, value){
			seat_type_name += index+' ';
			
		});
		row += '<td>'+seat_type_name+'</td>';
		var days = '';
		$.each(JSON.parse(value.train_available_days), function(index, valued){
			if(valued == 1){
				days += 'Sun';
			} else if(valued == 2){
				days += 'Mon';
			} else if(valued == 3){
				days += 'Tue';
			} else if(valued == 4){
				days += 'Wed';
			} else if(valued == 5){
				days += 'Thu';
			} else if(valued == 6){
				days += 'Fri';
			} else if(valued == 7){
				days += 'Sat';
			}
			if(index < JSON.parse(value.train_available_days).length-1){
				days += ', ';
			}
		});
		row += '<td>'+days+'</td>';
		row += '</tr>';
		table.append(row);
	});

	var search_field = document.getElementById('station_search');
	search_field.addEventListener('keyup', function(){
		
		var search_value = $('#station_search').val();

		var train_table= $('#train_list tr');

		$.each(train_table, function(index, value){
			var train_name = $(value).data('train-name');
			if(train_name.indexOf(search_value.toLowerCase()) == -1){
				$(value).hide();
			} else {
				$(value).show();
			}
		});
		
	});
});