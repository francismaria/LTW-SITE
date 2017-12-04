<?php

    $dbh = new PDO('sqlite:database/helpo.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>