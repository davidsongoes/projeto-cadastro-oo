( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
	$('#cssmenu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
});
} )( jQuery );

$(function() {
	$( ".datepicker" ).datepicker({
		dateFormat: "dd/mm/yy",
		changeMonth: true,
		changeYear: true
	});
});

$(function() {
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		show: {
			effect: "clip",
			duration: 100
		},
		hide: {
			effect: "fade",
			duration: 100
		}
	});
	$( ".opener" ).click(function() {
		$( "#dialog" ).dialog( "open" );
	});
});


$(function() {
	$( "#accordion" ).accordion({
		collapsible: true
	});
});