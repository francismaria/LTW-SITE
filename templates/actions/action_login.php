<?
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
$db = new Database('../../database/helpo.db');
$user = $db->get_user_from_credentials($_POST['username'], $_POST['password']);
header('Location: ../../profile_page.php?id='.$user['USER_ID']);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
  if (isset($user['USER_ID'])) {
    $_SESSION['loggedin']     = '1'; //Aqui cria a sessão loggedin para começar para as outras páginas
	$_SESSION['usertype']     = $user['ROLE'];   
    $_SESSION['userid']       = $user['USER_ID'];
    $_SESSION['username']     = $user['USERNAME'];
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
