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
  
  $('.clearform').click(function() {
    $(this).closest('form').find('input[type="textbox"]').val('');
    $(this).closest('form').find('input[type="textbox"]').css('box-shadow', '0 0 0px');
  });
  
  $('#clearsearch').click(function() {
    $('#searchresult').hide();
  });  
  
  $('input[type="textbox"]').click(function() {
    $('input[type="textbox"]').css('box-shadow', '0 0 0px');
  });
  
  $('#homesearch #runsearch').click(function() {
    var projectname = $('#homesearch input[name="project_id"]').val();
    var listname   = $('#homesearch input[name="list_id"]').val();
	if (projectname == '' && listname=='') {
      $('#homesearch input[name="project_id"]').css('box-shadow', '0 0 10px red');
	  $('#homesearch input[name="list_id"]').css('box-shadow', '0 0 10px red');
      return;
    }
	$('table.list').remove();
	$('#homecontent').after('<table class="list homelist"></table>');
	//$('table.list').append('<tr><td>Project Name</td><td>List Name</td><td>Task Name</td><td>User Name</td></tr>');   
	
	$.post('./templates/actions/action_search.php',
		   { project_name:projectname, list_name:listname},
		   function(data) {
			 if (data != '0') {
				$('table.list').append(data);
				$('#homesearch input[name="project_id"]').css('box-shadow', '0 0 10px green');
				$('#homesearch input[name="list_id"]').css('box-shadow', '0 0 10px green');
			 } else {
			   $('#listsadd input[name="name"]').css('box-shadow', '0 0 10px red');
			 }
		   });
    
  });
  
});