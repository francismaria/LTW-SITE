<html>

    <?php

    include_once('database/connection.php');

    try {
        $stmt = $dbh->prepare('SELECT * FROM USER WHERE USERNAME = :username AND PASSWORD = :password');

        $username = $_POST['username'];
        $password = $_POST['pass'];

        $stmt->execute();

        while($row = $stmt->fetch()){
            echo $row['FIRST_NAME'];
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    ?>
</html>