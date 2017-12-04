<?php

    include_once('database/connection.php');
    include_once('session.php');

    //if login is correct only!!!
    setCurrentUser($_POST['username']);

    //header('Location: '.$_SERVER['HTTP_REFERER']);//fica no mesmo sitio??
/*
    try {
        $stmt = $dbh->prepare('SELECT * FROM USER WHERE USERNAME = ? AND PASSWORD = ?');

        $stmt->execute(array($username, $password));

        while($row = $stmt->fetch()){
            echo $row['FIRST_NAME'];
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
*/
?>

<html>
    <body>
        <a href="action_logout.php">LOG OUT</a>
    </body>
</html>
