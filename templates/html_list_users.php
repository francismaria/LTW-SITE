<?
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

?>

<form>
  <table class="list userslist" id="<? echo $users_section; ?>table">
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>Nickname</td>
      <td>Type</td>
    </tr><?
    foreach ($users_list as $user) {
      echo '<tr>';
      echo '<td><input id="' . $user['USER_ID'] . '" type="checkbox"/></td>';
      echo '<td><a href="profile_page.php?id=' . $user['USER_ID'] . '">' . $user['USERNAME'] . '</a></td>';
      echo '<td id="usertype">';
      switch ($user['ROLE']) {
        case 1:
          echo 'Administrator';
          break;
        case 2:
          echo 'Editor';
          break;
        case 3:
          echo 'User';
          break;
      }
      echo '</td>';
      echo '</tr>';
    }
?></table>
</form>
