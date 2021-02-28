<?php
if (isset($_POST['btnlogin'])) {
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    login($phone , $password);
}

if (isset($_GET['login'])){
    $msg = "تلفن همراه یا رمز عبور اشتباه است.";
    phpAlert($msg);
}

if (isset($_GET['first'])){
    $msg = "ابتدا وارد شوید.";
    phpAlert($msg);
}
?>