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

$taskLists = $db->getTasksListsFromListsId($_GET['id']);

?>
<div id="tasks">
<h1>Tasks</h1>
<div id="taskscontent">
    <script type="text/javascript" src="./js/project.js"></script>
    <a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>delete</div></a>
    <a href="#"><div class="button" id="add"><img src="./images/add-icon.png"/>add</div></a>
	<form class="compactform" id="tasksadd" style="display:none">
      <div class="line">
        Task Name
        <input name="name" type="textbox" placeholder="Name"/>
		<input id="addtask" type="button" value="Add"/>
        <input class="clearform" type="button" value="Clear"/><br/>
      </div>
    </form>
<form>
  <table class="list taskslist" id="<? echo $task_section; ?>table">
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>Name</td>
	  <td>Description</td>
    </tr><?
    foreach ($taskLists as $taskList) {
		$task = $db->getTaskFromTaskId($taskList['task_id']);
      echo '<tr>';
      echo '<td><input id="' . $taskList['task_id'] . '" type="checkbox"/></td>';
      echo '<td><a id="' . $task['task_name'] . '" >' . $task['task_name'] .'</a></td>';
	  echo '<td><a id="' . $task['task_description'] . '">' . $task['task_description'] .'</a></td>';
      echo '</tr>';
    }
?></table>
</form>
</div>
</div>