$(document).ready(function() {
	$('.filternav').click(function() {
		$('.carfilter').slideToggle();
	});
});

$(document).ready(function() {
	filter_data(1);
	function filter_data(page) {
		$('.filter_data').html('<div id="loading" style=""></div>');
		var action = 'fetch_data';
		var make = get_filter('make');
		var model = get_filter('model');
		var year = get_filter('year');
		var transmission = get_filter('transmission');
		var seating_capacity = get_filter('seating_capacity');
		var body_style = get_filter('body_style');
		var drive_type = get_filter('drive_type');
		var fuel_type = get_filter('fuel_type');
		var color = get_filter('color');
		var cylinder_engine = get_filter('cylinder_engine');

			$.ajax({
				url:"carslisting/fetch_data/"+page,
				method:"POST",
				dataType:"JSON",
				data:{action:action, make:make, model:model, year:year, transmission:transmission, seating_capacity:seating_capacity, body_style:body_style, drive_type:drive_type, fuel_type:fuel_type, color:color, cylinder_engine:cylinder_engine},
				success:function(data) {
					$('.filter_data').html(data.car_list);
					$('#pagination_link').html(data.pagination_link);
				}
			})
	}

	function get_filter(class_name) {
		var filter = [];

		$('.' + class_name + ':checked').each(function() {
			filter.push($(this).val());
		});

		return filter;
	}

	$(document).on('click', '.pagination li a', function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    filter_data(page);
  });

  $('.common_selector').click(function(){
        filter_data(1);
    });

});

// $(document).ready(function() {
	
// });