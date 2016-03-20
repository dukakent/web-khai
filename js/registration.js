var login = $(".registration-login");
var password = $(".registration-password");
var confirmPassword = $(".registration-confirm-password");


function checkSubmit() {
    if(
    checkLogin() &&
    checkPassword() &&
    checkConfirmPassword()) {
        return true;
    }
    return false;
}

function checkLogin () {
    var pattern = /^\w+$/i;
    var match = pattern.exec(login.val());
    var error = $(".registration-error:eq(0)");
    if (!match) {
        error.html("Логин должен содержать латинские символы, цифры или \"_\"");
        return false;
    } 
    else if (login.val().length < 4) {
        error.html("Логин должен содержать не менее 4-х символов");
        return false;
    } else {
        error.html("");
        return true;
    }
}

function checkPassword () {
    var error = $(".registration-error:eq(1)");
    if (password.val().length < 4) {
        error.html("Пароль должен содержать не менее 4-х символов");
        return false;
    } else {
        error.html("");
        return true;
    }
}


function checkConfirmPassword () {
    var error = $(".registration-error:eq(2)");
    if (password.val() != confirmPassword.val()) {
        error.html("Пароли не совпадают!!");
        return false;
    } else if (confirmPassword.val().length < 4) {
        error.html("Пароль должен содержать не менее 4-х символов");
        return false;
    } else {
        error.html("");
        return true;
    }
}

login.blur(checkLogin);
password.blur(checkPassword);
confirmPassword.blur(checkConfirmPassword);

$(".registration-option-selall").click(function () {
    $(".registration-option").prop("checked", true);
    console.log("selall");
});

$(".registration-option-deselall").click(function () {
    $(".registration-option").prop("checked", false);
});

$(".registration-option-invert").click(function () {
    var checked = $(".registration-option:checked");
    $(".registration-option").prop("checked", true);
    checked.prop("checked", false);
});