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
      <link rel="stylesheet" href="css/profile_header.css">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
      <script type="text/javascript" src="js/login.js"></script>
    </head>


    <body>
        <header>
            <div id="logo">
                <a href="home.php"> <img src="images/todolist.png" alt="Logo" /> </a>
            </div>

            <h1><a href="home.php">Helpo</a></h1>
        </header>


    <!-- <body>
      <div id="header">
        <div id="logo">
          <a href="home.php"><img src="images/todolist.png" alt="Logo" /></a>
        </div> -->

        <section id="menu"> 
          <div id="options">
            <?
              echo '<a href="home.php?id=' . $_SESSION['userid'] .'"><div class="text">Home</div></a>';
              echo '<a href="projects.php?id=' . $_SESSION['userid'] .'"><div class="text">My Projects</div></a>';
              echo '<a href="todolists.php?id=' . $_SESSION['userid'] .'"><div class="text">My Lists</div></a>';
              echo '<a href="mytasks.php?id=' . $_SESSION['userid'] .'"><div class="text">My Tasks</div></a>';
            ?>
          </div>
        
          <div id="theUser">
            <?
              if (isset($_SESSION['loggedin'])) 
              {
                echo '<div id="usershow"><a href="profile_page.php?id='. $_SESSION['userid'] . '">';
                if ($_SESSION['useravatar'] != NULL) {
                    echo '<img class="mini_avatar" src="' . $_SESSION['useravatar'] . '"/>';
                } else {
                    echo '<img class="mini_avatar" src="images/default-avatar.png"/>';
                }
                ?></a><?
                echo '<a href="profile_page.php?id='. $_SESSION['userid'] . '">';
                echo '<div class="text">' . $_SESSION['username'] . '</div></a></div>';
                echo '<div id="usermenu">';
                echo '<a href="profile_page.php?id='. $_SESSION['userid'] . '"><p> Profile Page </p></a>';
                echo '<a href="favorites_page.php"><p> Favorites Page </p></a>';
                if( $_SESSION['usertype'] == 1) {
                    echo '<a href="users_page.php"><p> Manage accounts </p></a>';
                    echo '<a href="servers_page.php"><p> Manage servers </p></a>';
                }
                echo '<a href="./templates/actions/action_logout.php"><p> Log out </p></a></div></div>';
              }else {?>
              
              <?}?>
          </div>
        </section>
        <!-- <div id="redLine">
          <?
            //echo '<div class="text dateheader">' . date('jS \of F Y h:i A') . '</div>';
            // if (isset($_SESSION['loggedin'])) 
            // {
            //    echo '<div id="usershow"><a href="profile_page.php?id='. $_SESSION['userid'] . '">';
            //    if ($_SESSION['useravatar'] != NULL) {
            //       echo '<img class="mini_avatar" src="' . $_SESSION['useravatar'] . '"/>';
            //    } else {
            //       echo '<img class="mini_avatar" src="./images/default-avatar.png"/>';
            //    }
            //    echo '<div class="text">' . $_SESSION['username'] . '</div></a>';
            //    echo '<div id="usermenu">';
            //    echo '<a href="profile_page.php?id='. $_SESSION['userid'] . '"><p> Profile Page </p></a>';
            //    echo '<a href="favorites_page.php"><p> Favorites Page </p></a>';
            //    if( $_SESSION['usertype'] == 1) {
            //       echo '<a href="users_page.php"><p> Manage accounts </p></a>';
            //       echo '<a href="servers_page.php"><p> Manage servers </p></a>';
            //    }
            //    echo '<a href="./templates/actions/action_logout.php"><p> Log out </p></a></div></div>';
            // }else {?>
            
            <?//}?>
        </div> -->
        <!-- <div id="yellowLine"> -->
           <?  
				// echo '<a href="projects.php?id=' . $_SESSION['userid'] .'"><div class="text">My Projects</div></a>';
        //         echo '<a href="todolists.php?id=' . $_SESSION['userid'] .'"><div class="text">My Lists</div></a>';
				// echo '<a href="mytasks.php?id=' . $_SESSION['userid'] .'"><div class="text">My Tasks</div></a>';
              
          //echo '<div class="text dateheader">' . date('jS \of F Y h:i A') . '</div>';
          // if (isset($_SESSION['loggedin'])) 
          // {
          //   echo '<div id="usershow"><a href="profile_page.php?id='. $_SESSION['userid'] . '">';
          //   if ($_SESSION['useravatar'] != NULL) {
          //       echo '<img class="mini_avatar" src="' . $_SESSION['useravatar'] . '"/>';
          //   } else {
          //       echo '<img class="mini_avatar" src="./images/default-avatar.png"/>';
          //   }
          //   echo '<div class="text">' . $_SESSION['username'] . '</div></a>';
          //   echo '<div id="usermenu">';
          //   echo '<a href="profile_page.php?id='. $_SESSION['userid'] . '"><p> Profile Page </p></a>';
          //   echo '<a href="favorites_page.php"><p> Favorites Page </p></a>';
          //   if( $_SESSION['usertype'] == 1) {
          //       echo '<a href="users_page.php"><p> Manage accounts </p></a>';
          //       echo '<a href="servers_page.php"><p> Manage servers </p></a>';
          //   }
          //   echo '<a href="./templates/actions/action_logout.php"><p> Log out </p></a></div></div>';
          // }else {?>
          
          <?//}?>
        <!-- </div> -->
      <!-- </div> -->