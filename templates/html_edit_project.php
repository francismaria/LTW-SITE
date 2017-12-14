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
    <a href="#"><div class="button" id="addUser"><img src="./images/add-icon.png"/>Add User to Task</div></a>
	<a href="#"><div class="button" id="add"><img src="./images/add-icon.png"/>Add List</div></a>	
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
	  <td>User Name</td>
    </tr><?
	$lists_id = $db->get_lists_by_project_id($_GET['id']);	
	foreach($lists_id as $list_id){		
		$list = $db->get_list_from_id($list_id['list_id']);		
		$taskslist = $db->getTasksListsFromListsId($list['list_id']);
		foreach($taskslist as $tasklist){
			echo '<tr>';
			$task = $db->getTaskFromTaskId($tasklist['task_id']);
			echo '<td><input id="' . $task['task_id'] . '" type="checkbox"/></td>';
			echo '<td><a id="' . $list['list_name'] .'">' . $list['list_name'] . '</a></td>';
			echo '<td><a id="' . $task['task_name'] . '"href="tasks.php?id=' . $list['list_id'] . '">' . $task['task_name'] . '</a></td>';
			?>
			<td>
			<input list="users" name="user<?=$task['task_id']?>" type="textbox" placeholder="UserName" 
			<?
			$user_id = $db->get_user_by_project_task_id($_GET['id'], $task['task_id']);
			$user = $db->get_user_from_id($user_id['user_id']);
			
			if($user['USERNAME']!= ''){
				echo 'value="'. $user['USERNAME'] . '"';
			}
			?>
			/>	
			  <datalist id="users">
				<?php 
					$users = $db->get_users();
					foreach ($users as $user) {
						echo '<option value="' . $user['USERNAME'] . '">';
					}
				?>
			  </datalist>
			</td>
			<?
			echo '</tr>';
		}			
	} 
?></table>
</form>
</div>
</div>