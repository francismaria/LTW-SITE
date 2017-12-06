<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
?>
 
<div id="profile">
  <h1 id="profileheader">Profile</h1>
  <div id="profilecontent"><?
    if ($_SESSION['loggedin'] && (($_SESSION['userid'] == $user['USER_ID'])) ) {
      echo '<script type="text/javascript" src="./js/profile.js"></script>';
      echo '<div id="profileoptions">';
      echo '<a class="button" id="editbutton" href="#"><img src="./images/button-edit.gif"/></a>';
      echo '</div>';
    }
    if (isset($user['IMG_NAME'])) {
      echo '<img id="profileimage" src=" ./images/' . $user['IMG_NAME'] . '"/>';
    } else {
      echo '<img id="profileimage" src="./images/default-avatar.png"/>';
    }
  ?><table class="ptable">
      
      <tr>
        <td>First Name</td>
        <td id="firstname"><?echo $user['FIRST_NAME'];?></td>
      <tr>
	  <tr>
        <td>Last Name</td>
        <td id="lastname"><?echo $user['LAST_NAME'];?></td>
      <tr>
      <tr>
        <td>Nickname</td>
        <td id="nickname"><?echo $user['USERNAME']?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td id="email"><?echo $user['EMAIL']?></td>
      </tr>
    </table>
  </div>
</div>