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
$task_section = "tasks";
include_once('./templates/html_header.php');
include_once('./templates/html_tasks.php');
include_once('./templates/html_footer.php');
?>