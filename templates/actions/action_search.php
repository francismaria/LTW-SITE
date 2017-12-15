<?php
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
if ($_SESSION['loggedin']) {
  $db = new Database('../../database/helpo.db');
	if($_POST['project_name']!= '' && $_POST['list_name'] == ''){
		echo '<tr><td>Project Name</td><td>List Name</td><td>Task Name</td><td>User Name</td></tr>';
		$project = $db->get_project_id_from_project_name($_POST['project_name']);
		$lists = $db->get_lists_by_project_id($project['project_id']);
		echo '<tr><td>' . $project['project_name'] . '</td></tr>';
		foreach($lists as $list){
			$l = $db->get_list_from_id($list['list_id']);
			echo '<tr><td></td><td>' . $l['list_name'] . '</td></tr>';
			$tasks = $db->getTasksListsFromListsId($list['list_id']);
			foreach($tasks as $task){
				$t = $db->getTaskFromTaskId($task['task_id']);
				echo '<tr><td></td><td></td><td>' . $t['task_name'] . '</td>';
				$user = $db->get_user_by_project_task_id($project['project_id'],$t['task_id']);
				if($user['user_id'] == NULL){
					echo '<td>No User To Task</td></tr>';
				} else{
					$u = $db->get_user_from_id($user['user_id']);
					echo '<td>'.$u['USERNAME'].'</td></tr>';
				}
			}
		}
		
	} else if ($_POST['list_name'] != '' && $_POST['project_name'] == ''){
		echo '<tr><td>List Name</td><td>Task Name</td></tr>';
		$list = $db->get_list_id_from_list_name($_POST['list_name']);
		echo '<tr><td>' . $list['list_name'] . '</td></tr>';
		$tasks = $db->getTasksListsFromListsId($list['list_id']);
		foreach($tasks as $task){
			$t = $db->getTaskFromTaskId($task['task_id']);
			echo '<tr><td></td><td>' . $t['task_name'] . '</td>';
		}
	} else {
		echo '<tr><td>Project Name</td><td>List Name</td><td>Task Name</td><td>User Name</td></tr>';
		$project = $db->get_project_id_from_project_name($_POST['project_name']);
		$list = $db->get_list_id_from_list_name($_POST['list_name']);
		echo '<tr><td>' . $project['project_name'] . '</td><td>'.$list['list_name'].'</td></tr>';		
		$l = $db->get_list_from_id($list['list_id']);
		$tasks = $db->getTasksListsFromListsId($list['list_id']);
		foreach($tasks as $task){
			$t = $db->getTaskFromTaskId($task['task_id']);
			echo '<tr><td></td><td></td><td>' . $t['task_name'] . '</td>';
			$user = $db->get_user_by_project_task_id($project['project_id'],$t['task_id']);
			if($user['user_id'] == NULL){
				echo '<td>No User To Task</td></tr>';
			} else{
				$u = $db->get_user_from_id($user['user_id']);
				echo '<td>'.$u['USERNAME'].'</td></tr>';
			}
		}		
	}

}