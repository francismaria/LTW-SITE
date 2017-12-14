<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

// session_start();
  
// if (isset($_SESSION['loggedin']) && ($_SESSION['usertype'] == 1)) {

    include_once('../../database/db.php');
    $db = new Database('../../database/helpo.db');
    // $tasks = $db->getTasksFromListsId(1);    //TODO: COMO IR BUSCAR O IR DO CURRENT USER?

    $taskLists = $db->getTasksListsFromListsId(2);


    include_once('../common/header.php');
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

<?php
    include_once('../common/footer.php');
?>