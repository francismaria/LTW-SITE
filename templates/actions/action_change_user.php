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
  
if ($_SESSION['loggedin']) {
  require_once('../../database/db.php');

  $db = new Database('../../database/helpo.db');

  $db->update_user_more(stripcslashes(strip_tags($_POST['nickname'])), stripcslashes(strip_tags($_POST['firstname'])),stripcslashes(strip_tags($_POST['lastname'])),						
                        stripcslashes(strip_tags($_POST['email'])));
  if ($_SESSION['username'] == stripcslashes(strip_tags($_POST['nickname'])))
    $_SESSION['useravatar'] = stripcslashes(strip_tags($_POST['avatar']));
}
  else {
    echo '1';
    die();
  }
  echo 2;
