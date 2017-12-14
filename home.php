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
$home_section = "home";
include_once('./templates/html_header.php');
include_once('./templates/html_home.php');
include_once('./templates/html_footer.php');
?>