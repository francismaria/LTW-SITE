<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/
    require_once('database/db.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <title>HELPO | To Do List</title>
        <meta charset="UTF-8" />
        <meta name="description" content="HELPO is a tool to help you organize your every day life!"/>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
        <link rel="stylesheet" href="css/layout.css"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <noscript>Your web browser does not support JavaScript. Some features may be disabled. Update to the latest
            version of your browser.</noscript>
    </head>

    <body>
        <header>
            <div id="logo">
                <a href="index.php">
                    <img src="images/todolist.png">
                </a>
            </div>

            <h1><a href="index.php">Helpo</a></h1>
        </header>

        <section id="menu"> 
            <!-- <a href="index.php"><button type="button" class="form_button">HOME</button></a> -->
            <button type="button" class="form_button">HOME</button>
            <button type="button" onclick="showLoginForm()" class="form_button">LOG IN</button>
            <button type="button" onclick="showSignupForm()" class="form_button">SIGN UP</button>
        </section>

