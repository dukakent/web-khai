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