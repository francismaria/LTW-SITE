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
    $todolists = $db->getListsFromUserId(3);    //TODO: COMO IR BUSCAR O IR DO CURRENT USER?

    include_once('../common/header.php');
?>

<section id="todolists">
    <ul>
        <?php foreach ($todolists as $todolist) 
        { ?>
        <li> <a href="todolists.php"><?=$todolist['list_name']?></a> </li>
        <?php } ?>
    </ul>
</section>

<?php
    include_once('../common/footer.php');
?>