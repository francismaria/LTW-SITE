<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
include_once('./database/db.php');
$db = new Database('./database/helpo.db');
$todolists = $db->getListsFromUserId($_GET['id']);   

if($_GET['id'] != $_SESSION['userid']){
	header("Location: notpermit.html");
}

?>
<form>
  <table class="list listslist" id="<? echo $todolist_section; ?>table">
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>Name</td>
    </tr><?
    foreach ($todolists as $todolist) {
      echo '<tr>';
      echo '<td><input id="' . $todolist['list_id'] . '" type="checkbox"/></td>';
      echo '<td><a id="' . $todolist['list_name'] . '"href="tasks.php?id=' . $todolist['list_id'] . '">' . $todolist['list_name'] . '</a></td>';
      echo '</tr>';
    }
?></table>
</form>