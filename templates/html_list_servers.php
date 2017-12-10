<?
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

?>

<form>
  <table class="list serverslist" id="<? echo $servers_section; ?>table">
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>Name</td>
    </tr><?
    foreach ($servers_list as $server) {
      echo '<tr>';
      echo '<td><input id="' . $server['server_id'] . '" type="checkbox"/></td>';
      echo '<td><a id="' . $server['url'] . '"href="server_page.php?id=' . $server['server_id'] . '">' . $server['name'] . '</a></td>';
      echo '</tr>';
    }
?></table>
</form>