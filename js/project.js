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
		$(this).closest('form').find('textarea').val('');
		$(this).closest('form').find('textarea').css('box-shadow', '0 0 0px');
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
	
	$('#taskscontent #delete').click(function() {			
		$('#taskstable tr:not(:first-child) td input:checked').each(function() {
		  var taskid = $(this).attr('id');
		  var taskname = $(this).parent().parent();
		  var taskdescriptions = $(this).parent().parent().parent();
		  $.post('./templates/actions/action_remove_task.php',
				 { task_id: taskid },
				 function(data) {
				   if (data == '1') {
					 taskname.remove();
				   }
				 });
		});
	});
	
	$('#taskscontent #add').click(function() {
		if ($('#taskscontent #tasksadd').is(':hidden')) {
		  $(this).css('background-color', 'gainsboro');
		  $('#taskscontent #tasksadd').show();
		} else {
		  $(this).css('background-color', 'transparent');
		  $('#taskscontent #tasksadd').hide();
		}
	});
	
	$('#tasksadd #addtask').click(function() {
		var task_name = $('#tasksadd input[name="name"]').val();
		var task_lday = $('#tasksadd input[name="day"]').val();
		var task_lmonth = $('#tasksadd input[name="month"]').val();
		var task_lyear = $('#tasksadd input[name="year"]').val();
		var task_description = $('#tasksadd textarea').val();
		var list_id = $('#tasksadd input[name="id"]').val();
		if (task_name == '') {
			$('#tasksadd input[name="name"]').css('box-shadow', '0 0 10px red');
			return;
		}
		if (task_lday == '' || task_lday<1 || task_lday>31) {
			$('#tasksadd input[name="day"]').css('box-shadow', '0 0 10px red');
			return;
		}
		if (task_lmonth == '') {
			$('#tasksadd input[name="month"]').css('box-shadow', '0 0 10px red');
			return;
		}
		if (task_lyear == '') {
			$('#tasksadd input[name="year"]').css('box-shadow', '0 0 10px red');
			return;
		}
		if (task_description == '') {
			$('#tasksadd textarea').css('box-shadow', '0 0 10px red');
			return;
		}
		$.post('./templates/actions/action_add_task.php',
		   { name: task_name, description: task_description, id: list_id, lday: task_lday, lmonth: task_lmonth, lyear: task_lyear},
		   function(data) {
			 if (data != '0') {
			   $('#tasksadd input[name="name"]').val('');
			   $('#tasksadd input[name="day"]').val('');
			   $('#tasksadd input[name="month"]').val('');
			   $('#tasksadd input[name="year"]').val('');
			   $('#tasksadd textarea').val('');
			   $('#taskstable').append('<tr><td><input id="' + data + 
										 '" type="checkbox"/><td><a id="' + task_name + '" >' + task_name +'</a></td><td><a id="' + task_description + '">' + task_description +'</a></td></tr>'); //alterar
			 } else {
			   $('#tasksadd input[name="name"]').css('box-shadow', '0 0 10px red');
			   $('#tasksadd input[name="day"]').css('box-shadow', '0 0 10px red');
			   $('#tasksadd input[name="month"]').css('box-shadow', '0 0 10px red');
			   $('#tasksadd input[name="year"]').css('box-shadow', '0 0 10px red');
			   $('#tasksadd textarea').css('box-shadow', '0 0 10px red');
			 }
		   });
	}); 
});