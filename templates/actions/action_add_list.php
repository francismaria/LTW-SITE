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
if ($_SESSION['loggedin']) {
  $db = new Database('../../database/helpo.db');
  $list_id = 0;
  $list_id = $db->add_list(htmlspecialchars($_POST['name']), $_SESSION['userid']);
  echo $list_id;
}