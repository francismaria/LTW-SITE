<?
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
 
require_once('../database/db.php');

session_start();
header('Location: ../profile_page.php');
if (isset($_POST['username']) && isset($_POST['pass'])) {
  $db = new Database('../database/helpo.db');
  $user = $db->get_user_from_credentials($_POST['username'], $_POST['pass']);
	
  if (isset($user['user_id'])) {
    $_SESSION['loggedin']     = '1'; //Aqui cria a sessão loggedin para começar para as outras páginas
    $_SESSION['userid']       = $user['USER_ID'];
    $_SESSION['username']     = $user['USERNAME'];
    $_SESSION['usernickname'] = $user['PASSWORD'];
    $_SESSION['useremail']    = $user['EMAIL'];
    $_SESSION['first_name']   = $user['FIRST_NAME'];
	$_SESSION['last_name']    = $user['LAST_NAME']; 
	$_SESSION['bday']         = $user['BDAY']; 
	$_SESSION['bmonth']       = $user['BMONTH'];
	$_SESSION['byear']        = $user['BYEAR'];  	
    $_SESSION['useravatar']   = $user['IMG_NAME'];
	
  }
  else {
    //colocar uma página erro, para efetuar login again
  }
}