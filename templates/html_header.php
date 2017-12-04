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
      <meta charset="utf-8">
      <title>To.Do.List</title>
      <link rel="stylesheet" href="templates/style.css">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
      <script type="text/javascript" src="js/login.js"></script>
    </head>
    <body>
      <div id="header">
        <div id="logo">
          <a href="home.php"><img src="images/logo.jpg" alt="Logo" /></a>
        </div>
        <div id="redLine">
          <?
            echo '<div class="text dateheader">' . date('jS \of F Y h:i A') . '</div>';
            if (isset($_SESSION['loggedin'])) 
            {
               echo '<div id="usershow"><a href="profile_page.php?id='. $_SESSION['userid'] . '">';
               if ($_SESSION['useravatar'] != NULL) {
                  echo '<img class="mini_avatar" src="' . $_SESSION['useravatar'] . '"/>';
               } else {
                  echo '<img class="mini_avatar" src="./img/default-avatar.png"/>';
               }
               echo '<div class="text">' . $_SESSION['usernickname'] . '</div></a>';
               echo '<div id="usermenu">';
               echo '<a href="profile_page.php?id='. $_SESSION['userid'] . '"><p> Profile Page </p></a>';
               echo '<a href="favorites_page.php"><p> Favorites Page </p></a>';
               
               if( $_SESSION['usertype'] < 3) {
                  echo '<a href="add_news_page.php"><p> Add news </p></a>';
                  echo '<a href="my_news_page.php"><p> My news </p></a>';
               }
               if( $_SESSION['usertype'] == 1) {
                  echo '<a href="users_page.php"><p> Manage accounts </p></a>';
                  echo '<a href="servers_page.php"><p> Manage servers </p></a>';
               }
               echo '<a href="./templates/action_logout.php"><p> Log out </p></a></div></div>';
            }else {?>
            <a href="#"><div class="text window_login">Sign in or Join!</div></a>
            <div id="login-box">
               <form method="POST" class="signin" action="./templates/action_login.php">
                  <div class="normaltext">Nickname</div>
                  <input id="username" type="textbox" name="username" autocomplete="on" placeholder="Username">
                  <div class="normaltext">Password</div>
                  <input id="password" name="password" type="password" placeholder="Password">
                  <input id="submit_button" type="submit" value="Sign in"/>
                  <p>
                     <a href="registration_page.php">You don't have an account? Join us!</a>
                  </p>        
               </form>
            </div>
            <?}?>
        </div>
        <div id="yellowLine">
           <?  /*TODO: colocar os principais TO-DO lists!!!!!
              $db = new Database('database/helpoo.db');
              $tags = $db->get_ordered_tags(5);
              foreach($tags as $tag)
              {
                 echo '<a href="search_page.php?search=' . $tag['value'] .
                      '"><div class="text">' . $tag['value'] . '</div></a>';
              }*/
           ?>
        </div>
      </div>