<?php
    /*
     * Copyright (C) LTW @ FEUP project authors. All rights reserved.
     *
     * Authors:
     * - Bruno Miguel <@fe.up.pt>
     * - Francisco <@fe.up.pt>
     * - Pedro Azevedo   <up201306026@fe.up.pt>
     */
 
    include_once('includes/init.php');
	require_once('./database/db.php');

    $db = new Database('./database/helpo.db');
    
    include_once('templates/common/header.php');
    include_once('templates/common/registers.php');
    include_once('templates/common/intro.php');
    include_once('templates/common/footer.php');
?>

