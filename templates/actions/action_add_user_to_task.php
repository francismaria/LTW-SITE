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
  $user = $db->get_user_by_name(htmlspecialchars($_POST['user_name']));
  $user_id = $db->get_user_by_project_task_id($_POST['project_id'], $task['task_id']);

  if($user_id['user_id'] != '' && $user_id['user_id'] != NULL && $user_id['user_id'] != 0){
	   $db->update_user_to_task(htmlspecialchars($_POST['project_id']),htmlspecialchars($_POST['task_id']),$user['USER_ID']);
  }else{
     $db->add_user_to_task(htmlspecialchars($_POST['project_id']),htmlspecialchars($_POST['task_id']),$user['USER_ID']);
  }



  echo $user['USER_ID'];
}
