/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
 
$(document).ready(function() {
   $('div.window_login').click(function() {

		//Fade in the Window
		$('#login-box').fadeIn(300);
	
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the mask layer the popup is closed
	$('#mask').live('click', function() { 
	  $('#mask , #login-box').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});