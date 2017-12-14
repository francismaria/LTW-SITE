<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
 

  function get_color($task_id){ //function parameters, two variables.
	include_once('./database/db.php');
	$db = new Database('./database/helpo.db');
	$task = $db->get_completed_from_task_id($task_id);
	if($task['task_completed'] == 1){
		$string = green;
	} else{
		$today_day = date("Y");
		$today_month = date("m");
		$today_day = date("d");

		$days = $task['limit_day'] - $today_day;
		if($days>= 0 && $days < 5){
			$color = 50;
		} else if($days >= 5 && $days < 10){
			$color=100;
		} else if($days >= 10 && $days < 20){
			$color=150;
		} else if($days >= 20 && $days <31){
			$color=200;
		} else if($days >= 31){
			$color=255;
		} else{
			$color = 0;
		}
		$string = "rgb(255,".$color.",0)";
	}
    return $string;  //returns the second argument passed into the function
  }