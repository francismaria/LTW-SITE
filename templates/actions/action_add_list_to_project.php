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
  $list = $db->get_list_id_from_list_name(htmlspecialchars($_POST['name']));
  $db->add_list_to_project($list['list_id'], htmlspecialchars($_POST['id']));
  echo $list['list_id'];
}