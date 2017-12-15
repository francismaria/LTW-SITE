    <!-- <button type="button" class="form_button">HOME</button>
    <button type="button" onclick="showLoginForm()" class="form_button">LOG IN</button>
    <button type="button" onclick="showSignupForm()" class="form_button">SIGN UP</button> -->

    <section id="interaction_form">
        <div id="login_form">
            <div id="login">
                <form method="POST" action="./templates/actions/action_login.php" >
                    <label>Username<br/></label>
                    <input id="username" type="text" name="username" autocomplete="on" placeholder="Username">
                    <label><br/>Password<br/></label>
                    <input id="password" name="password" type="password" placeholder="Password"><br/>
                    <input type="submit"  value="Enter"/>
                </form>
            </div>
            <div id="login_info">
                <img src="images/talking.jpg" height="350" width="100%" alt="It wasn't possible to show this image."/>
            </div>
        </div>


        <div id="signup_form">
            <form action="templates/actions/action_signin.php" method="post" enctype="multipart/form-data">
                <label><br/>First Name<br/></label>
                <input type="text" name="first_name" required/>
                <label><br/>Last Name<br/></label>
                <input type="text" name="last_name" required/>
                <label><br/>E-mail<br/></label>
                <input type="email" name="e_mail" required/>
                <label><br>Username (max: 15 characters)<br/></label>
                <input type="text" name="username" maxlength="15" required/>
                <label><br/>Password (min: 6 characters)<br/></label>
                <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required/><br/>
                <label>Enter your birthdate</label><br/>
                <div class="bdaySelector">
                    <label>Day:</label>
                    <select id="day" name="day" required>
                    </select>
                    <label>Month:</label>
                    <select id="month" name="month" onchange="updateDays()" required>
                        <option value="null">-</option>
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
                        <option value="december">December</option>
                    </select>
                    <label>Year:</label>
                    <select id="years" name="years" required>
                    </select>
                </div>
                <label><br/>Profile Picture<br/></label>
                <input type="file" name="file" id="file"/><br/><br/>
                <input type="checkbox" name="terms" oninvalid=notCheckedTerms(); required/>
                I accept the terms and conditions of this website.<br/>
                <input type="submit" value="Register"/>
            </form>

            <div id="signup_info">
                <img src="images/reunion.jpg" height="100%" width="100%" alt="It wasn't possible to show this image."/>
            </div>
        </div>
    </section>

<?php
?>