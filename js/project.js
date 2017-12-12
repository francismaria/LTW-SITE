/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
$(document).ready(function() {
	$('#listscontent #delete').click(function() {			
		$('#liststable tr:not(:first-child) td input:checked').each(function() {
		  var listid = $(this).attr('id');
		  var listname = $(this).parent().parent();
		  $.post('./templates/actions/action_remove_list.php',
				 { list_id: listid },
				 function(data) {
				   if (data == '1') {
					 listname.remove();
				   }
				 });
		});
	});

	$('#listscontent #add').click(function() {
		if ($('#listscontent #listsadd').is(':hidden')) {
		  $(this).css('background-color', 'gainsboro');
		  $('#listscontent #listsadd').show();
		} else {
		  $(this).css('background-color', 'transparent');
		  $('#listscontent #listsadd').hide();
		}
	});
	
	$('#listsadd #addlist').click(function() {
		var list_name = $('#listsadd input[name="name"]').val();
		if (list_name == '') {
			$('#listsadd input[name="name"]').css('box-shadow', '0 0 10px red');
			return;
		}
		$.post('./templates/actions/action_add_list.php',
		   { name: list_name},
		   function(data) {
			 if (data != '0') {
			   $('#listsadd input[name="name"]').val('');
			   $('#liststable').append('<tr><td><input id="' + data + 
										 '" type="checkbox"/></td><td><a href="tasks.php?id=' +
										 data + '">' + list_name + '</a></td></tr>');
			 } else {
			   $('#listsadd input[name="name"]').css('box-shadow', '0 0 10px red');
			 }
		   });
	}); 
	
	$('.clearform').click(function() {
		$(this).closest('form').find('input[type="textbox"]').val('');
		$(this).closest('form').find('input[type="textbox"]').css('box-shadow', '0 0 0px');
	});

	$('input[type="textbox"]').click(function() {
		$('input[type="textbox"]').css('box-shadow', '0 0 0px');
	});
		
	$('.checkboxcontrol').change(function() {
	if ($(this).is(':checked'))
	  $(this).closest('form').find('input[type="checkbox"]').attr('checked', 'checked');
	else
	  $(this).closest('form').find('input[type="checkbox"]').removeAttr('checked');
	});
});