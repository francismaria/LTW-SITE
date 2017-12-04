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
    $('#profilenews').css('display', 'none');
    $('#profileoptions #editbutton').css('display', 'none');
    $('#profilecontent .ptable').css('display', 'none');
    
    // Creates edit elements
    $('#profileoptions').append('<a class="button" id="seeprofilebutton" href="#"><img src="./img/button-return.png"/> see profile</a>');
    $('#profilecontent').append('<div id="profileedit"></div>');

    // Change password form
    $('#profilecontent #profileedit').append('<form id="changepassword" class="longform"></form>');
    $('#profilecontent #changepassword').append('<h3>Change Password</h3>');
    $('#profilecontent #changepassword').append('<input type="password" name="oldpassword" placeholder="Old Password"/> <br />');
    $('#profilecontent #changepassword').append('<input type="password" name="password" placeholder="New Password"/> <br />');
    $('#profilecontent #changepassword').append('<input type="password" name="passwordconfirmation" placeholder="New Password Confirmation"/> <br />');
    $('#profilecontent #changepassword').append('<input type="button" value="Save"/>');
    
    // Prepares variables for change more form
    var name  = $('#profilecontent .ptable #name').html();
    var email = $('#profilecontent .ptable #email').html();
    var avatar_url = $('#profilecontent #profileimage').attr('src');
    if (avatar_url == './img/default-avatar.png') {
      avatar_url = '';
    }
    
    // Change more form
    $('#profilecontent #profileedit').append('<form id="changemore" class="longform"></form>');
    $('#profilecontent #changemore').append('<h3>Change More</h3>');
    $('#profilecontent #changemore').append('<input type="textbox" name="name" placeholder="Name" value="' + name + '"/> <br />');
    $('#profilecontent #changemore').append('<input type="textbox" name="email" placeholder="Email" value="' + email + '"/> <br />');
    $('#profilecontent #changemore').append('<input type="textbox" name="avatar" placeholder="Avatar URL" value="' + avatar_url + '"/> <br />');
    $('#profilecontent #changemore').append('<input type="button" value="Save"/>');
    
    // Defines handler for 'see profile' button.
    $('#profileoptions #seeprofilebutton').click(function() {
      // Makes elements visible
      $('#profilenews').css('display', 'block');
      $('#profileoptions #editbutton').css('display', 'block');
      $('#profilecontent .ptable').css('display', 'block');
      
      // Remove edit elements
      $('#profileoptions #seeprofilebutton').remove();
      $('#profilecontent #profileedit').remove();
    });
    
    // Defines handler for password save.
    $('#profileedit #changepassword input[type="button"]').click(function() {
      var user_nickname = $('#profilecontent .ptable #nickname').html();
      var old_password  = $('#changepassword input[name="oldpassword"]').attr('value');
      var new_password  = $('#changepassword input[name="password"]').attr('value');
      var new_password_confirmation = $('#changepassword input[name="passwordconfirmation"]').attr('value');
 
      if ((new_password != new_password_confirmation) || (new_password == "")) {
        // Password confirmation incorrect
        $('#changepassword input[name="password"]').css('box-shadow', '0 0 10px red');
        $('#changepassword input[name="passwordconfirmation"]').css('box-shadow', '0 0 10px red');
        return;
      } else {
        // Does ajax request for password changing
        $.post('./templates/action_change_password.php', { nickname: user_nickname, oldpassword: old_password, newpassword: new_password }, 
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
      var user_nickname = $('#profilecontent .ptable #nickname').html();
      var user_name     = $('#changemore input[name="name"]').attr('value');
      var user_email    = $('#changemore input[name="email"]').attr('value');
      var user_avatar   = $('#changemore input[name="avatar"]').attr('value');
 
      // Checks empty strings
      if (user_name == "")
        $('#changemore input[name="name"]').css('box-shadow', '0 0 10px red');
      if (user_email == "")
        $('#changemore input[name="email"]').css('box-shadow', '0 0 10px red');
      if ((user_name == "") || (user_email == ""))
        return;
        
      // Does ajax request for user changing
      $.post('./templates/action_change_user.php', { nickname: user_nickname, name: user_name, email: user_email, avatar: user_avatar }, 
          function(data) {
            if (data == '1' || data == '2') {
              // Success: changes profile values
              $('#changemore input[name="name"]').css('box-shadow', '0 0 10px green'); 
              $('#changemore input[name="email"]').css('box-shadow', '0 0 10px green');
              $('#changemore input[name="avatar"]').css('box-shadow', '0 0 10px green');
              
              $('#profilecontent .ptable #name').html(user_name);
              $('#profilecontent .ptable #email').html(user_email);
              if (user_avatar == '')
                user_avatar = './img/default-avatar.png';
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
