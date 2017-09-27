var $floater_btn = $('.floater__btn');
var $floater = $('.floater');

$floater_btn.on('click', function(e) {
  $floater.toggleClass('is-active');
  e.stopPropagation();
});

$(document).ready(function() {
	$('#purchase_date').datepicker({
		dateFormat: 'yy-mm-dd'
	})
});

$(document).ready(function() {
	$('#license_start_date').datepicker({
		dateFormat: 'yy-mm-dd'
	})
});

$(document).ready(function() {
	$('#license_end_date').datepicker({
		dateFormat: 'yy-mm-dd'
	})
});