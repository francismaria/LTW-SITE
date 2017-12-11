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
    $db = new Database('./database/helpo.db');
    $todolists = $db->getListsFromUserId(3);    //TODO: COMO IR BUSCAR O IR DO CURRENT USER?

    include_once('./templates/common/header.php');
?>

<section id="todolists">
    <?php foreach ($todolists as $todolist) { ?>
    <article>
        <h2><?=$todolist['list_name']?></h2>
    </article>
    <?php } ?>
</section>

<?php
    include_once('./templates/common/footer.php');
?>