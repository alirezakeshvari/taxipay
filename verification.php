<?php include_once "page/header.php" ?>
<?php  

if (isset($_SESSION['sms'])) {

} else {
    header("location:index.php");
}
if (isset($_POST['btnconfirm'])) {
    if ($_POST['sms'] == $_SESSION['sms']) {
        header("location:info.php");
    }
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
            <h2>کد ارسال شده را وارد کنید</h2>
            <input type="text" name="sms" placeholder="کد یک بار مصرف" value="<?php echo $_SESSION['sms']; ?>" required>
            <div class="signin-btn-animate-login">
                <input type="submit" name="btnconfirm" value="ادامه">
            </div>
        </form>
    </div>  
<?php include_once "page/footer.php" ?>