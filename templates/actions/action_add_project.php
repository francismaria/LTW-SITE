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
  $project_id = 0;
  $project_id = $db->add_project(htmlspecialchars($_POST['name']), $_SESSION['userid']);
  echo $project_id;
}