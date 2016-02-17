<?php
include('template/header.php');
include('template/sidebar.php');

$errors = ['', '', ''];
$login = '';
$password = '';
$rPassword = '';
$about = '';
$success = false;

function validateLogin($login) {
    if(preg_match('/^\w{4,}$/i', $login)){
        return true;
    }
    return false;
}

function validatePassword($password) {
    if(preg_match('/^[^\s]{4,}$/i', $password)){
        return true;
    }
    return false;
}


if(post('act') == 'registration') {
    $login = str_replace('"', '&quot;', post('login'));
    $password = post('password');
    $rPassword = post('confirm-password');
    $about = post('about');
    
    $isLogin = validateLogin($login);
    $isPassword = validatePassword($password);
    $isValid = $isLogin && $isPassword;
    $isSame = $password == $rPassword;
    if(!$isLogin) {
        $errors[0] = 'Invalid input value';
    }
    if(!$isPassword) {
        $errors[1] = 'Invalid password chars or length is less then 4 chars';
    }
    if(!$isSame) {
        $errors[2] = 'Passwords are not same';
    }
    if($isValid && $isSame) {
        $success = true;
    }
}
?>
        <div class="main">
            <div class="info">
                <div class="block-header hooge-font">
                    <div>registration</div>
                    <img src="<?=$url;?>img/block_arrow.png" alt="">
                </div>
<?php
if(!$success) {                
?>
                <div class="registration">
                    <form id="registration-form" action="" method="post" onsubmit="return checkSubmit()">
                        <div><input type="hidden" name="act" value="registration"></div>
                        <div><input class="value" type="text" name="login" placeholder="Введите логин" size="30" value="<?=$login;?>"><span class="error"><?=$errors[0];?></span></div>
                        <div><input class="value" type="password" name="password" placeholder="Введите пароль" size="30"><span class="error"><?=$errors[1];?></span></div>
                        <div><input class="value" type="password" name="confirm-password" placeholder="One more time" size="30"><span class="error"><?=$errors[2];?></span></div>
                        <div><textarea class="value" name="about" id="about" cols="30" rows="10" placeholder="Расскажите о себе"><?=$about;?></textarea><span class="error"></span></div>
                        <div><input name="submit" type="submit" value="Зарегистрироваться"></div>
                    </form>
                </div>
<?php
}
else {
    echo "<h1>Регистрация произведена успешно!</h1>";
}            
?>
            </div>
        </div>
<?php
include('template/footer.php');
?>