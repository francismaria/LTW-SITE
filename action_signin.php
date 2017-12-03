<?php

    include_once("database/connection.php");

    try {

        if(move_uploaded_file($_FILES['file']['tmp_name'], "images/userspics/".$_FILES["file"]["name"])){
            echo 'File is valid';
        }
        else{
            echo 'File is not valid';
            echo $_FILES['file']['error'];
        }

        $stmt = $dbh->prepare('INSERT INTO USER(USERNAME, PASSWORD, EMAIL, FIRST_NAME, LAST_NAME, 
                              BDAY, BMONTH, BYEAR, IMG_NAME) VALUES
                              (:username, :password, :email, :firstname, :lastname, :bday, :bmonth, :byear, :img_name)');

        $username = $_POST["username"];
        $password = $_POST["pass"];
        $email = $_POST["e_mail"];
        $firstname = $_POST["first_name"];
        $lastname = $_POST["last_name"];
        $bday = $_POST["day"];
        $bmonth = $_POST['month'];
        $byear = $_POST['year'];
        $img_name = $username.".jpg";

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':bday', $bday);
        $stmt->bindParam(':bmonth', $bmonth);
        $stmt->bindParam(':byear', $byear);
        $stmt->bindParam(':img_name', $img_name);

        $stmt->execute();
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    echo '<img src="images/userspics/' . $_FILES["file"]["name"]."jpg" . ' alt="not found" >';
?>