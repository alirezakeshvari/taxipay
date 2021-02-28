<?php 
include_once "page/header.php"; 
include_once "controllers/signupController.php";
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


