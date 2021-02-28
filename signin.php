<?php 
include_once "page/header.php"; 
include_once "controllers/signinController.php";
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
            <h2>ورود به پنل کاربری  </h2>
            <input type="text" name="phone" placeholder="تلفن همراه" required>
            <input type="password" name="password" placeholder="رمز عبور" required>
            <div class="signin-btn-animate-login">
                <input type="submit" name="btnlogin" value="ورود">
            </div>
        </form>
        <a href="signup.php">ثبت نام نکرده اید ؟</a>
    </div>
    <div class="policy-animate-login">
        <p>تمامی حقوق مادی و معنوی این وبسایت متعلق به تاکسی پی میباشد</p>
    </div>

<?php include_once "page/footer.php"; ?>