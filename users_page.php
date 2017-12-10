<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

session_start();
  
if (isset($_SESSION['loggedin']) && ($_SESSION['usertype'] == 1)) {
  require_once('./database/db.php');

  $db = new Database('./database/helpo.db');
  $users_list = $db->get_users();
  $users_section = "users";
   
  require_once('./templates/html_header.php');
  echo '<div id="users">';
  echo '<h1>Users</h1>';
  echo '<div id="userscontent">';
  echo '<script type="text/javascript" src="./js/admin.js"></script>';
  echo '<a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>delete</div></a>';
  echo '<a href="#"><div class="button" id="demote"><img src="./images/down-arrow.png"/>demote</div></a>';
  echo '<a href="#"><div class="button" id="promote"><img src="./images/up-arrow.png"/>promote</div></a>';
  require_once('./templates/html_list_users.php');
  echo '</div>';
  echo '</div>';
  require_once('./templates/html_footer.php');
} else {
  header('Location: ./index.php');
}