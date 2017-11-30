<?php
  //include_once('includes/init.php');

 // include_once('database/category.php');
  //include_once('database/product.php');

  //$categories = getAllCategories();
  //$products = getAllProducts();

  include_once('templates/common/header.php');
  //include_once('templates/category/list_categories.php');
  //include_once('templates/product/list_products.php');
  include_once('templates/common/footer.php');
?>


<!--

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
                    <button type="button" onclick="showLoginForm()">LOG IN</button>

                    <div id="login_form">
                        <p>Log In</p>
                        <form action="action_login.php" method="post">
                            <label>Username<br/></label>
                            <input type="text" name="username"/>
                            <label><br/>Password<br/></label>
                            <input type="password" name="pass"/><br/>
                            <input type="submit"  value="Enter"/>
                        </form>
                    </div>
                </div>

                <div id="signup">
                    <button type="button" onclick="showSignupForm()">SIGN IN</button>

                    <div id="signup_form">
                        <form action="action_login.php" method="post">
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
                            <input type="checkbox" name="terms" oninvalid="alert('You must accept HELPO terms and ' +
                             'conditions in order to create a new account.');" required/>
                            I accept the terms and conditions of HELPO website.<br/>
                            <input type="submit" value="Sign In"/>
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

//-->