<?php include_once "page/header.php"; ?>
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
<div class="container-animate-login">
    <div class="animation-hacheena">
        <a href="index.php">
            <h1>
                <span>T</span>
                <span>A</span>
                <span>X</span>
                <span>I</span>
                <span>P</span>
                <span>A</span>
                <span>Y</span>
            </h1>
        </a>

    </div>

    <div class="main-animate-login">
        <form action="" method="post">
            <h2>ثبت نام در تاکسی پی</h2>
            <input type="text" name="code" placeholder="کد تاکسیرانی" maxlength="5" minlength="5" required> 
            <input type="text" name="name" placeholder="نام و نام خانوادگی" required>
            <input type="text" name="phone" placeholder="تلفن همراه : 09123456789" maxlength="11" minlength="11" required>
            <input type="password" name="password" placeholder="رمز عبور" required>
            <input type="password" name="cpassword" placeholder="تکرار رمز عبور" required>
            <div class="signin-btn-animate-login">
                <input type="submit" name="btnsignup" value="ثبت نام">
            </div>
        </form>
        <a href="signin.php">حساب کاربری دارید؟</a>
    </div>

<?php include_once "page/footer.php"; ?>


