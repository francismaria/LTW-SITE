<?
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
require_once('./database/db.php');

$db = new Database('./database/helpo.db');
$projects_list = $db->get_projects();
?>
<script type="text/javascript" src="./js/search.js"></script>
<a href="#"><div class="button" id="search"><img src="./images/search-icon.png"/>search</div></a>

<div id="home">
<h1>Pesquisa</h1>
	<div id="homecontent">
	<form class="compactform" id="homesearch" style="display:none">
		<div class="line">
		Project
		<input list="projectos" name="project_id" type="textbox" placeholder="ProjectName"/>
		<datalist id="projectos">
			<?php 
				$projects = $db->get_projects();
				foreach ($projects as $project) {
					echo '<option value="' . $project['project_name'] . '">';
				}
			?>
		</datalist>
		List
		<input list="listas" name="list_id" type="textbox" placeholder="ListName"/>
		<datalist id="listas">
			<?php 
				$lists = $db->get_lists();
				foreach ($lists as $list) {
					echo '<option value="' . $list['list_name'] . '">';
				}
			?>
		</datalist>
		<!--Task
		<input list="tarefas" name="task_id" type="textbox" placeholder="TaskName"/>
		<datalist id="tarefas">
			<?php /*
				$tasks = $db->get_tasks();
				foreach ($tasks as $task) {
					echo '<option value="' . $task['task_name'] . '">';
				}*/
			?>
		</datalist>
		User
		<input list="utilizadores" name="user_id" type="textbox" placeholder="UserName"/>
		<datalist id="utilizadores">
			<?php 
				/*$users = $db->get_users();
				foreach ($users as $user) {
					echo '<option value="' . $user['USERNAME'] . '">';
				}*/
			?>
		</datalist>
		</div>
		<div class="line">
			Task Limit Date
			<input class="day" name="lday" type="textbox" placeholder="DD"/>
			<input class="month" name="lmonth" type="textbox" placeholder="MM"/>
			<input class="year" name="lyear" type="textbox" placeholder="YYYY"/>
			Task Completed
			<td><input id="completed" type="checkbox"/></td>-->
			<input id="runsearch" type="button" value="Run Search"/>
			<input id="clearsearch" class="clearform" type="button" value="Clear"/>
		</div>
		<div class="line">
		</div> 
	</form>
	</div>
	<form>
	  <table class="list homelist" id="<? echo $home_section; ?>table">
		<tr>
		  <td>Project Name</td>
		  <td>Creator Name</td>
		</tr><?	
		foreach ($projects_list as $project) {
		  echo '<tr>';
		  echo '<td><a id="' . $project['project_id'] . '">' . $project['project_name'] . '</a></td>';
		  $user = $db->get_user_from_id($project['user_id']);
		  echo '<td><a id="' . $user['USER_ID'] . '" href="profile_page.php?id=' .$user['USER_ID'] . '">' . $user['USERNAME'] . '</a></td>';
		  echo '</tr>';
		}
	?></table>
	</form>
</div>