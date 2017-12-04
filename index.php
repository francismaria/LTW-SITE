<?php
/* 
 * Copyright (C) LTW @ FEUP project authors. All rights reserved.
 *
 * Authors:
 * - Bruno Miguel <@fe.up.pt>
 * - Francisco <@fe.up.pt>
 * - Pedro Azevedo   <up201306026@fe.up.pt>
 */
 
    include_once('session.php');
	require_once('./database/db.php');

	$db = new Database('./database/helpo.db');
?>

<html>

    <head>
        <title>HELPO | To Do Tool</title>
        <meta charset="UTF-8" />
        <meta name="description" content="HELPO is a tool to help you organize your every day life!"/>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
        <noscript>Your web browser does not support JavaScript. Some features may be disabled. Updated the latest
            version of your browser.</noscript>
    </head>

    <body>
        <header>
            <h1><a href="#">HELPO</a></h1>
            <h3>Your best friend in making your every day life easier</h3>
        </header>

        <section id="interaction_form">
            <h2>Don't miss a thing! Connect to your every day tasks with your new best friend HELPO</h2>

            <section id="form">
                <div id="login">
                    <button type="button" onclick="showLoginForm()" class="enter_button">LOG IN</button>

                    <div id="login_form">
                        <p>Log In</p>
                        <form method="POST" action="./templates/action_login.php" >
                            <label>Username<br/></label>
                            <input id="username" type="textbox" name="username" autocomplete="on" placeholder="Username">
                            <label><br/>Password<br/></label>
                            <input id="password" name="password" type="password" placeholder="Password"><br/>
                            <input type="submit"  value="Enter"/>
							
                        </form>
                    </div>
                </div>

                <div id="signup">
                    <button type="button" onclick="showSignupForm()" class="enter_button">SIGN IN</button>

                    <div id="signup_form">
                        <form action="action_signin.php" method="post" enctype="multipart/form-data">
                            <label><br/>First Name<br/></label>
                            <input type="text" name="first_name" required/>
                            <label><br/>Last Name<br/></label>
                            <input type="text" name="last_name" required/>
                            <label><br/>E-mail<br/></label>
                            <input type="email" name="e_mail" required/>
                            <label><br>Username<br/></label>(maximum number of characters: 15)<br/>
                            <input type="text" name="username" maxlength="15" required/>
                            <label><br/>Password<br/></label>(minimun number of characters: 6)<br/>
                            <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required/><br/>
                            <label>Enter your birthdate</label><br/>
                            <div class="bdaySelector">
                                <label>Day:</label>
                                <select id="day" name="day" required>
                                </select>
                                <label>Month:</label>
                                <select id="month" name="month" onchange="updateDays()" required>
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="decemeber">December</option>
                                </select>
                                <label>Year:</label>
                                <select id="year" name="year" required>
                                </select>
                            </div>
                            <label><br/>Profile Picture<br/></label>
                            <input type="file" name="file" id="file"/><br/><br/>
                            <input type="checkbox" name="terms" oninvalid=notCheckedTerms(); required/>
                            I accept the terms and conditions of HELPO website.<br/>
                            <input type="submit" value="Register"/>
                        </form>
                    </div>
                </div>
            </section>
        </section>

        <section class="info_container">
            <p>Join other 1.200.000 people in this amazing service</p>
        </section>

        <footer></footer>
    </body>

    <script type="text/javascript" src="js/file.js"></script>
</html>