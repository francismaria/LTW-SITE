/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
 
function handle_promotion(usertype, data) {  
  switch (data) {
    case '1':
      usertype.html('Administrator');
      break;
    case '2':
      usertype.html('Editor');
      break;
    case '3':
      usertype.html('User');
      break;
  }
}

$(document).ready(function() {
  $('#userscontent #delete').click(function() {
    $('tr:not(:first-child) td input:checked').each(function() {
      var userid = $(this).attr('id');
      var userhtml = $(this).parent().parent();
      $.post('./templates/actions/action_remove_user.php',
             { user_id: userid },
             function(data) {
               if (data == '1') {
                 userhtml.remove();
               }
             });
    });
  });
  
  $('#userscontent #demote').click(function() {
    $('tr:not(:first-child) td input:checked').each(function() {
      var userid = $(this).attr('id');
      var usertype = $(this).parent().parent().children('#usertype');
      $.post('./templates/actions/action_user_promotion.php',
             { promotion: 2, user_id: userid }, 
             function(data) { handle_promotion(usertype, data); });
    });
  });
  
  $('#userscontent #promote').click(function() {
    $('tr:not(:first-child) td input:checked').each(function() {
      var userid = $(this).attr('id');
      var usertype = $(this).parent().parent().children('#usertype');
      $.post('./templates/actions/action_user_promotion.php',
             { promotion: 1, user_id: userid },
             function(data) { handle_promotion(usertype, data); });
    });
  });
  
  $('#serverscontent #delete').click(function() {
    $('#serverstable tr:not(:first-child) td input:checked').each(function() {
      var serverid = $(this).attr('id');
      var serverhtml = $(this).parent().parent();
      $.post('./templates/actions/action_remove_server.php',
             { server_id: serverid },
             function(data) {
               if (data == '1') {
                 serverhtml.remove();
               }
             });
    });
  });
  
  $('#serverscontent #search').click(function() {
    if ($('#serverscontent #serverssearch').is(':hidden')) {
      $(this).css('background-color', 'gainsboro');
      $('#serverscontent #add').css('background-color', 'transparent');
      $('#serverscontent #serverssearch').show();
      $('#serverscontent #serversadd').hide();
    } else {
      $(this).css('background-color', 'transparent');
      $('#serverscontent #serverssearch').hide();
    }
  });
  
  $('#serverscontent #add').click(function() {
    if ($('#serverscontent #serversadd').is(':hidden')) {
      $(this).css('background-color', 'gainsboro');
      $('#serverscontent #search').css('background-color', 'transparent');
      $('#serverscontent #serversadd').show();
      $('#serverscontent #serverssearch').hide();
    } else {
      $(this).css('background-color', 'transparent');
      $('#serverscontent #serversadd').hide();
    }
  });
  
  $('#serversadd #addserver').click(function() {
    var server_name = $('#serversadd input[name="name"]').val();
    var server_url  = $('#serversadd input[name="url"]').val();
    if (server_name == '') {
      $('#serversadd input[name="name"]').css('box-shadow', '0 0 10px red');
      return;
    }
    if (server_url == '') {
      $('#serversadd input[name="url"]').css('box-shadow', '0 0 10px red');
      return;
    }
    $.post('./templates/actions/action_add_server.php',
           { name: server_name, url: server_url },
           function(data) {
             if (data != '0') {
               $('#serversadd input[name="name"]').val('');
               $('#serversadd input[name="url"]').val('');
               $('#serverstable').append('<tr><td><input id="' + data + 
                                         '" type="checkbox"/></td><td><a href="' +
                                         server_url + '">' + server_name + '</a></td></tr>');
             } else {
               $('#serversadd input[name="name"]').css('box-shadow', '0 0 10px red');
               $('#serversadd input[name="url"]').css('box-shadow', '0 0 10px red');
             }
           });
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
    
  $('.checkboxcontrol').change(function() {
    if ($(this).is(':checked'))
      $(this).closest('form').find('input[type="checkbox"]').attr('checked', 'checked');
    else
      $(this).closest('form').find('input[type="checkbox"]').removeAttr('checked');
  });
});
