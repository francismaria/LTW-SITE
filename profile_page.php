<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

require_once('./database/db.php');

$db = new Database('./database/helpo.db');
$user = $db->get_user_from_id($_GET['id']);
echo ($user[USERNAME]);
if (!empty($user)) {
  session_start();
  require_once('./templates/html_header.php');
  require_once('./templates/html_profile.php');
  require_once('./templates/html_footer.php');
} else {
  //header('Location: ./error_page.php?error=1'); erro do género, depois fazer
}