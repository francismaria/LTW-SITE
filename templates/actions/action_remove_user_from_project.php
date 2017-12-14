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
  $project = $db->get_project_id_from_project_name(htmlspecialchars($_POST['project_name'])); 
  $db->remove_user_from_project(htmlspecialchars($_POST['task_id']), $project['project_id']);

}