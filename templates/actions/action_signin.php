<?php
    try {
        require_once('../../database/db.php');

        $db = new Database('../../database/helpo.db');


		    $role = 3; //predefined User Role
        $username = $_POST["username"];
        $password = $_POST["pass"];
        $email = $_POST["e_mail"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $bday = $_POST["day"];
        $bmonth = $_POST['month'];
        $byear = $_POST["years"];

        if(!is_uploaded_file($_FILES['file']['tmp_name'])){
          $img_name = "default-avatar.png";
        }
        else{
          // Gets extension from uploaded image
          $path = $_FILES['file']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);

          if(move_uploaded_file($_FILES['file']['tmp_name'],"./userspics/".$username. '.' .$ext)){
              echo 'File is valid';
          }
          else{
              echo 'File is not valid';
              echo $_FILES['file']['error'];
          }

          $img_name = $username.".jpg";
        }

        // Adds new user to the database
        $db->addNewUser($role, $username, $password, $email, $first_name, $last_name, $bday, $bmonth, $byear, $img_name);

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

	header('Location: ./../../index.php');
?>
