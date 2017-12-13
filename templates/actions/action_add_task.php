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
  $task_id = 0;
  $task_id = $db->add_task(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['id']),
						   htmlspecialchars($_POST['lday']),  htmlspecialchars($_POST['lmonth']),  htmlspecialchars($_POST['lyear']));
  echo $task_id;
}