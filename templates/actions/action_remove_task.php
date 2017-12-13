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
  $db->remove_task((int) $_POST['task_id']);
  echo '1';
}