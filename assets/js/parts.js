$(document).ready(function() {
	$('.filternav').click(function() {
		$('.partsfilter').slideToggle();
	});
});

$(document).ready(function() {
	filter_data(1);
	function filter_data(page) {
		$('.filter_data').html('<div id="loading" style=""></div>');
		var action = 'fetch_data';
		var category = get_filter('category');
		var brand = get_filter('brand');
		var color = get_filter('color');
		var model_name = get_filter('model_name');

			$.ajax({
				url:"partslisting/fetch_data/"+page,
				method:"POST",
				dataType:"JSON",
				data:{action:action, category:category, brand:brand, color:color, model_name:model_name},
				success:function(data) {
					$('.filter_data').html(data.parts_list);
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