<?php
    session_start();

    if(isset($_SESSION['loggedin'])){
        echo "You are logged in!";
    }
    else{
        echo "Not logged in!";
    }

    function setCurrentUser($username){
        $_SESSION['username'] = $username;
    }
?>