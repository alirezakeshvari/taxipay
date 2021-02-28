<?php 

if(isset($_POST['btnsignup'])){
    if($_POST['password'] == $_POST['cpassword']){
        $code = $_POST['code'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        signup($code , $name , $password , $phone);
    } else {
        //header('location:signup.php?password=error');
        $msg = "خطای پسورد. دوباره وارد کنید.";
        phpAlert($msg);
    }
}

if (isset($_GET['phone'])){
    $msg = "تلفن همراه یا کد شما قبلا ثبت شده.";
    phpAlert($msg);
}

?>