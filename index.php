<?php 
include_once "page/header.php"; 
include_once "controllers/indexController.php";
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
            <h2>پرداخت</h2>
            <input type="text" name="code" placeholder="کد راننده" required>
            <input type="text" name="price" placeholder="مبلغ واریز" required>
            <input type="text" name="phone" maxlength="11" minlength="11" placeholder="تلفن همراه : 09123456789" required>
            <div class="signin-btn-animate-login">
                <input type="submit" name="qrcode" value="QR Code Scanner" disabled>
                <input type="submit" name="btnpay" value="پرداخت">
            </div>
        </form>
        <a href="signin.php">ورود رانندگان</a>
    </div>    

<?php include_once "page/footer.php"; ?>