/**
 * Initializes years of the sign up form.
 */
setYears();

/**
 * @brief This function sets the days of the selected month.
 * @param monthSelected
 */
function setDays(monthSelected){
    let days = document.getElementById('day');

    /*This removes the set of days that were correspondent to the previous month selected*/
    while(days.firstChild) {
        days.removeChild(days.firstChild);
    }

    let totalDays;

    if(monthSelected === 'january' || monthSelected === 'march' || monthSelected === 'may' || monthSelected === 'july'
        || monthSelected === 'august' || monthSelected === 'october' || monthSelected === 'december'){
        totalDays = 31;
    }
    else if(monthSelected === 'april' || monthSelected === 'june' || monthSelected === 'september' || monthSelected === 'november'){
        totalDays = 30;
    }
    else if(monthSelected === 'february'){
        totalDays = 29;
    }

    for(let i = 1; i <= totalDays; i++){
        let option = document.createElement('option');
        option.setAttribute('value', i);
        option.innerHTML = i;
        days.appendChild(option);
    }
}

/**
 * @brief this function sets the years that can be selected of the sign up form.
 */
function setYears(){
    let startYear = 1900;
    let currentYear = (new Date()).getFullYear();

    let years = document.getElementById('years');

    for(let i = (currentYear-1); i >= startYear; i--){
        let option = document.createElement('option');
        option.setAttribute('value', i);
        option.innerHTML = i;
        years.appendChild(option);
    }
}

/**
 * @brief This function updates the days of the selected month
 */
function updateDays(){
    let monthDropdown = document.getElementById('month');
    let monthSelected = monthDropdown.options[monthDropdown.selectedIndex].value;

    setDays(monthSelected);
}

/**
 * @brief This function shows/hides the login form when the user presses the login button.
 */
function showLoginForm(){
    let login_form = document.getElementById('login_form');
    let signup_form = document.getElementById('signup_form');

    // Makes sure that the two forms don't appear at once
    if(signup_form.style.display == "block"){
        signup_form.style.display = "none";
    }

    if(login_form.style.display == "flex"){
        login_form.style.display = "none";
    }
    else{
        login_form.style.display = "flex";
    }
}

/**
 * @brief This function shows/hides the sign up form when the user presses the sign up button.
 */
function showSignupForm(){
    let signup_form = document.getElementById('signup_form');
    let login_form = document.getElementById('login_form');

    // Makes sure that the two forms don't appear at once
    if(login_form.style.display == "block"){
        login_form.style.display = "none";
    }

    if(signup_form.style.display == "block"){
        signup_form.style.display = "none";
    }
    else{
        signup_form.style.display = "block";
    }
}

/**
 * @brief This function shows an error message if the user has tried to sign up but hsn't checked the terms and conditions.
 */
function notCheckedTerms(){
        alert('You have to accept HELPO terms and conditions in order to create a new account.');
}

