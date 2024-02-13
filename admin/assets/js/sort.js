$(document).ready(function() {
	
	var ul_sortable = $('.dashboard-app-item-list-wrapper');
	ul_sortable.sortable({
	opacity: 0.325,
	tolerance: 'pointer',
	cursor: 'move',
	update: function(event, ui) {
		var post = ul_sortable.sortable('serialize');
	
		$.ajax({
			type: 'POST',
			url: 'db_action/sort_app.php',
			data: post,
			dataType: 'json',
			cache: false,
			success: function(output) {
				console.log('success -> ' + output);
			},
			error: function(output) {
				console.log('fail -> ' + output);
			}
		});
	
	}
	});
	ul_sortable.disableSelection();
	
});