
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var current_step = progress_line_object.data('current-step');
	var new_value = 8.333 + (current_step-1) * (100 / number_of_steps);
	progress_line_object.attr('style', 'width: ' + new_value + '%;');
}

jQuery(document).ready(function() {

	/*
        Fullscreen background
    */
	$.backstretch("../vendor/installer/img/backgrounds/1.jpg");

	$('#top-navbar-1').on('shown.bs.collapse', function(){
		$.backstretch("resize");
	});
	$('#top-navbar-1').on('hidden.bs.collapse', function(){
		$.backstretch("resize");
	});

	/*
        Form
    */
	$('.f1 fieldset:first').fadeIn('slow');

	/*
        Progress bar
     */
	bar_progress($('.f1-progress-line'));


	/*
        Env copy
     */
	$('.copy').click(function() {
		var id = $(this).data('id');
		var toCopy = $('#'+id);
		toCopy.select();
		document.execCommand('copy');
	});
});
