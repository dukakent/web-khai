<?php 
    $url = 'http://localhost/web-khai/';

    function post($name){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }
        return '';
    }

    function get($name){
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
        return '';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOSTING.COM</title>
    <link rel="stylesheet" href="<?=$url;?>css/style.css">
    <link rel="stylesheet" href="<?=$url;?>css/style-registration.css">
    <link rel="stylesheet" href="<?=$url;?>css/style-fm.css">
    <link rel="stylesheet" href="<?=$url;?>css/cars.css">
</head>
<body>
    <div class="header">
        <div class="bubbles">
            <div class="header-left">
<!--               style="margin-left: -255px; padding-right: 255px;"-->
                <div class="logo"  style="left: -255px"><a href="<?=$url;?>"><img src="<?=$url;?>img/logo.png" alt="logo"></a></div>
                <div class="just-use" style="top: -120px"><b>...just use</b></div>
                <div class="hosting" style="top: -120px">
                    <a href="<?=$url;?>">
                        <img src="<?=$url;?>img/hosting.png" alt="hosting.com">
                    </a>
                </div>
            </div>
            <div class="header-right" style="right: -200px"></div>
        </div>

        <div class="border-both"></div>
        <div class="menu hooge-font">
            <div class="menu-strip">
                <div class="nav">navigation</div>
                <div><img src="<?=$url;?>img/nav_decor.png" alt="decoration"></div>
            </div>
            <a href="#" class="menu-arrow"><img src="<?php echo $url ?>img/menu_arrow.png" alt="more categories"></a>
            <a href="<?=$url;?>redirect.php" class="menu-button"><div>contact</div></a>
            <a href="#" class="menu-button"><div>support</div></a>
            <a href="#" class="menu-button"><div>services</div></a>
            <a href="#" class="menu-button"><div>hosting</div></a>
        </div>
        <div class="border-vdots"></div>
    </div>
    <div class="container verdana-font">
