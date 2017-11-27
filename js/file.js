function showLoginForm(){
    var login_form = document.getElementById('login_form');

    if(login_form.style.display == "block"){
        login_form.style.display = "none";
    }
    else{
        login_form.style.display = "block";
    }
}

function showSignupForm(){
    var signup_form = document.getElementById('signup_form');

    if(signup_form.style.display == "block"){
        signup_form.style.display = "none";
    }
    else{
        signup_form.style.display = "block";
    }
}

function notChecked(){
    var checked = document.getElementsByName('terms').checked;

    if(!checked) {
        alert('You have to accept our terms and conditions in order to create a new account.');
    }
}