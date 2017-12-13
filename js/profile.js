/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
$(document).ready(function() {
  $('#profileoptions #editbutton').click(function() {
    // Hiddes elements
    
    $('#profileoptions #editbutton').css('display', 'none');
    $('#profilecontent .ptable').css('display', 'none');
    
    // Creates edit elements
    $('#profileoptions').append('<a class="button" id="seeprofilebutton" href="#"><img src="./images/button-return.png"/> see profile</a>');
    $('#profilecontent').append('<div id="profileedit"></div>');

    // Change password form
    $('#profilecontent #profileedit').append('<form id="changepassword" class="longform"></form>');
    $('#profilecontent #changepassword').append('<h3>Change Password</h3>');
    $('#profilecontent #changepassword').append('<input type="password" name="oldpassword" placeholder="Old Password"/> <br />');
    $('#profilecontent #changepassword').append('<input type="password" name="password" placeholder="New Password"/> <br />');
    $('#profilecontent #changepassword').append('<input type="password" name="passwordconfirmation" placeholder="New Password Confirmation"/> <br />');
    $('#profilecontent #changepassword').append('<input type="button" value="Save"/>');
    
    // Prepares variables for change more form
    let firstname  = $('#profilecontent .ptable #firstname').html();
	let lastname  = $('#profilecontent .ptable #lastname').html();
    let email = $('#profilecontent .ptable #email').html();
    let avatar_url = $('#profilecontent #profileimage').attr('src');
    if (avatar_url == './images/default-avatar.png') {
      avatar_url = '';
    }
    
    // Change more form
    $('#profilecontent #profileedit').append('<form id="changemore" class="longform"></form>');
    $('#profilecontent #changemore').append('<h3>Change More</h3>');
    $('#profilecontent #changemore').append('<input type="textbox" name="firstname" placeholder="FirstName" value="' + firstname + '"/> <br />');
	$('#profilecontent #changemore').append('<input type="textbox" name="lastname" placeholder="LastName" value="' + lastname + '"/> <br />');
    $('#profilecontent #changemore').append('<input type="textbox" name="email" placeholder="Email" value="' + email + '"/> <br />');
    $('#profilecontent #changemore').append('<input type="textbox" name="avatar" placeholder="Avatar URL" value="' + avatar_url + '"/> <br />');
    $('#profilecontent #changemore').append('<input type="button" value="Save"/>');
    
    // Defines handler for 'see profile' button.
    $('#profileoptions #seeprofilebutton').click(function() {
      // Makes elements visible
      $('#profileoptions #editbutton').css('display', 'block');
      $('#profilecontent .ptable').css('display', 'block');
      
      // Remove edit elements
      $('#profileoptions #seeprofilebutton').remove();
      $('#profilecontent #profileedit').remove();
    });
    
    // Defines handler for password save.
    $('#profileedit #changepassword input[type="button"]').click(function() {
      let user_nickname = $('#profilecontent .ptable #nickname').html();
      let old_password  = $('#changepassword input[name="oldpassword"]').attr('value');
      let new_password  = $('#changepassword input[name="password"]').attr('value');
      let new_password_confirmation = $('#changepassword input[name="passwordconfirmation"]').attr('value');
 
      if ((new_password != new_password_confirmation) || (new_password == "")) {
        // Password confirmation incorrect
        $('#changepassword input[name="password"]').css('box-shadow', '0 0 10px red');
        $('#changepassword input[name="passwordconfirmation"]').css('box-shadow', '0 0 10px red');
        return;
      } else {
        // Does ajax request for password changing
        $.post('./templates/actions/action_change_password.php', { nickname: user_nickname, oldpassword: old_password, newpassword: new_password }, 
          function(data) {
            if (data == '1') {
              // Success
              $('#changepassword input[name="oldpassword"]').css('box-shadow', '0 0 10px green'); 
              $('#changepassword input[name="password"]').css('box-shadow', '0 0 10px green');
              $('#changepassword input[name="passwordconfirmation"]').css('box-shadow', '0 0 10px green');
            } else {
              // Failure: old password wrong
              $('#changepassword input[name="oldpassword"]').css('box-shadow', '0 0 10px red');    
            }
          }
        );
      }
    });

    // Defines handler for more save.
    $('#profileedit #changemore input[type="button"]').click(function() {
      let user_nickname = $('#profilecontent .ptable #nickname').html();
      let first_name    = $('#changemore input[name="firstname"]').attr('value');
	  let last_name     = $('#changemore input[name="lastname"]').attr('value');
      let user_email    = $('#changemore input[name="email"]').attr('value');
 
      // Checks empty strings
      if (first_name == "")
        $('#changemore input[name="firstname"]').css('box-shadow', '0 0 10px red');
	  if (last_name == "")
        $('#changemore input[name="lastname"]').css('box-shadow', '0 0 10px red');
      if (user_email == "")
        $('#changemore input[name="email"]').css('box-shadow', '0 0 10px red');
      if ((first_name == "") || (last_name == "") || (user_email == ""))
        return;
        
      // Does ajax request for user changing
      $.post('./templates/actions/action_change_user.php', { nickname: user_nickname, firstname: first_name, lastname: last_name, email: user_email}, 
          function(data) {
			  console.log(data);
			  ;
            if (data == '1' || data == '2') {
              // Success: changes profile values
              $('#changemore input[name="firstname"]').css('box-shadow', '0 0 10px green'); 
			  $('#changemore input[name="lastname"]').css('box-shadow', '0 0 10px green');
              $('#changemore input[name="email"]').css('box-shadow', '0 0 10px green');
              
              $('#profilecontent .ptable #firstname').html(first_name);
			  $('#profilecontent .ptable #lastname').html(last_name);
              $('#profilecontent .ptable #email').html(user_email);
              if (user_avatar == '')
                user_avatar = './images/default-avatar.png';	
              $('#profilecontent #profileimage').attr('src', user_avatar);           
            }
            if (data == '2')
              $('#usershow img.mini_avatar').attr('src', user_avatar);
          }
        );
    });
     
    // Removes error or confirmation shadows
    $('#profileedit input[type="password"], #profileedit input[type="textbox"]').click(function() {
      $('#profileedit input[type="password"], #profileedit input[type="textbox"]').css('box-shadow', '0 0 0px');
    });
  });
});
