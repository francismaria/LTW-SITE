<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

require_once('../../database/db.php');

session_start();
if ($_SESSION['loggedin'] && ($_SESSION['usertype'] == 1)) {
  $db = new Database('../../database/helpo.db');
  $user = $db->get_user_from_id($_POST['user_id']);
  
  if ($_POST['promotion'] == 1) {
    switch ($user['ROLE']) {
      case 2:
        $new_role = 1;
        break;
      case 3:
        $new_role = 2;
        break;
      default:
        echo $user['ROLE'];
        return;
    }
  } else {
    switch ($user['ROLE']) {
      case 1:
        $new_role = 2;
        break;
      case 2:
        $new_role = 3;
        break;
      default:
        echo $user['ROLE'];
        return;
    }
  }
  $db->update_user_role($_POST['user_id'], $new_role);
  echo $new_role;
}