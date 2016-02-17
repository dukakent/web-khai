var login = document.getElementsByName("login")[0];
var password = document.getElementsByName("password")[0];
var confirmPassword = document.getElementsByName("confirm-password")[0];
var about = document.getElementsByName("about")[0];
var submit = document.getElementsByName("submit")[0];
var form = document.getElementById("registration-form");
var errors = document.getElementsByClassName("error");

function checkSubmit() {
    if(
    checkLogin() &&
    checkPassword() &&
    checkConfirmPassword()) {
        return true;
    }
    return false;
}

function checklogin () {
    var pattern = /^\w+$/i;
    var match = pattern.exec(login.value);
    if (!match) {
        errors[0].textContent = "Логин должен содержать латинские символы, цифры или \"_\"";
        return false;
    } 
    else if (login.value.length < 4) {
        errors[0].textContent = "Логин должен содержать не менее 4-х символов";
        return false;
    } else {
        errors[0].textContent = "";
        return true;
    }
}

function checkPassword () {
    if (password.value.length < 4) {
        errors[1].textContent = "Пароль должен содержать не менее 4-х символов";
        return false;
    } else {
        errors[1].textContent = "";
        return true;
    }
}


function checkConfirmPassword () {
    if (password.value != confirmPassword.value) {
        errors[2].textContent = "Пароли не совпадают";
        return false;
    } else if (confirmPassword.value.length < 4) {
        errors[2].textContent = "Пароль должен содержать не менее 4-х символов";
        return false;
    } else {
        errors[2].textContent = "";
        return true;
    }
}


login.addEventListener("focusout", checklogin);
password.addEventListener("focusout", checkPassword);
confirmPassword.addEventListener("focusout", checkConfirmPassword);
