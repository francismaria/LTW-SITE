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
<section id="tasks">
    <ul>
        <?php foreach($taskLists as $taskList)
        { 
            $tasks = $db->getTasksFromTaskId($taskList['task_id']);

            foreach($tasks as $task)
            { ?>
                <li><h3> <?=$task['task_name']?> </h3></li>
            <?php }
        } ?>
    </ul>
</section>