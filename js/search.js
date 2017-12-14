$(document).ready(function() {
	
	$('#search').click(function() {
		if ($('#homecontent #homesearch').is(':hidden')) {
		  $(this).css('background-color', 'gainsboro');
		  $('#homecontent #homesearch').show();
		} else {
		  $(this).css('background-color', 'transparent');
		  $('#homecontent #homesearch').hide();
    }
  });
});