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
  $server_id = 0;
  $server_id = $db->add_server(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['url']));
  echo $server_id;
}