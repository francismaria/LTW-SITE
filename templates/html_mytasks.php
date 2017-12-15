<?
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
include_once('./templates/actions/action_color_task.php');
include_once('./database/db.php');
$db = new Database('./database/helpo.db');

if($_GET['id'] != $_SESSION['userid']){
	header("Location: notpermit.html");
}


?>
<div id="mytasks">
<h1>My Tasks</h1>
<div id="mytaskscontent">
    <script type="text/javascript" src="./js/project.js"></script>
    <a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>Delete Task For me</div></a>
	<a href="#"><div class="button" id="completed"><img src="./images/check_mark.png"/>Completed</div></a>		
    </form>
<form>
  <table class="list mytaskslist" id="<? echo $mytasks_section; ?>table" >
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>Project Name</td>
	  <td>Task Name</td>
	  <td>Days Left</td>
    </tr><?
	$alltasks = $db->get_tasks_from_user($_GET['id']);	
	foreach($alltasks as $alltask){	
		$project = $db->get_project_by_project_id($alltask['project_id']);
		$task = $db->getTaskFromTaskId($alltask['task_id']);		
		echo '<tr>';
		echo '<td><input id="' . $task['task_id'] . '" type="checkbox"/></td>';
		echo '<input name="id'.$task['task_id'].'" type="textbox" placeholder="Name" value="'. $project['project_name'].'"style="display:none"/>';
		echo '<td><a id="' . $project['project_name'] . '"href="projects.php?id=' . $project['project_id'] . '"  >' . $project['project_name'] .'</a></td>';
		echo '<td><a id="' . $task['task_name'] .'"style="background-color: ';
		echo get_color($task['task_id']);
		echo '">' . $task['task_name'] . '</a></td>';
		echo '<td>'.get_days($task['task_id']).'</td>';
		echo '</tr>';
					
	} 
?></table>
</form>
</div>
</div>