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
if ($_SESSION['loggedin'] && $_POST['nickname'] && $_POST['oldpassword'] && $_POST['newpassword']) {
  require_once('../../database/db.php');
  $db = new Database('../../database/helpo.db');
  $user = $db->get_user_from_credentials($_POST['nickname'], $_POST['oldpassword']);
  if (isset($user['USER_ID'])) {
    $db->update_user_password($user['USER_ID'], $_POST['newpassword']);
    echo '1';
  } else {
    echo '0';
  }
}