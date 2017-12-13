<?
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

$project = $db->get_project_by_project_id($_GET['id']);

?>
<div id="projects">
<h1><?=$project['project_name']?></h1>
<div id="editprojectscontent">
    <script type="text/javascript" src="./js/project.js"></script>
    <a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>delete</div></a>
    <a href="#"><div class="button" id="add"><img src="./images/add-icon.png"/>add</div></a>
	<form class="compactform" id="editprojectsadd" style="display:none" >
      <div class="line">
        List Name
        <input list="lista" name="name" type="textbox" placeholder="Name" />	
		  <datalist id="lista">
			<?php 
				$lists = $db->get_lists();
				foreach ($lists as $list) {
					echo '<option value="' . $list['list_name'] . '">';
				}
			?>
		  </datalist>
		<input name="projectid" type="textbox" placeholder="Name" value="<?=$_GET['id'] ?>"style="display:none"/>
		<input id="addeditproject" type="button" value="Add"/>
		<input class="clearform" type="button" value="Clear"/><br/>
	</div>
    </form>
<form>
  <table class="list editprojectslist" id="<? echo $project_section; ?>table">
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>List Name</td>
	  <td>Task Name</td>
    </tr><?
	$lists_id = $db->get_lists_by_project_id($_GET['id']);	
	foreach($lists_id as $list_id){
		echo '<tr>';
		$list = $db->get_list_from_id($list_id['list_id']);
		echo '<td>';
		echo $list['list_name'];
		echo '</td>';
		echo '</tr>';
	}   
?></table>
</form>
</div>
</div>