<?php include_once "page/header.php"; ?>
<?php


if (isset($_POST['btnpay'])) {
    $selectdriver = selectdrivertopay($_POST['code']);
    if (!empty($selectdriver)) {
        if ($_POST['price'] >= 1000 && $_POST['price'] <= 200000) {
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['code'] = $_POST['code'];
            $_SESSION['sms'] = rand(1000 , 9999);

            header("location:verification.php");
        } else {
            $msg = "مبلغ وارد شده باید بین 1,000 تومان الی 200,000 تومان باشد.";
            phpAlert($msg);
        }
    } else {
        $msg = "کد وارد شده اشتباه میباشد. لطفا دوباره تلاش کنید.";
        phpAlert($msg);
    }
}


if (isset($_GET['information'])) {
    $msg = "خطا در دریافت اطلاعات. دوباره تلاش کنید.";
    phpAlert($msg);
}

if (isset($_GET['pay'])) {
    $msg = "پرداخت انجام شد. باتشکر از اعتماد شما.";
    phpAlert($msg);
}

if (isset($_GET['vip'])) {
    $msg = "با عرض پوزش! پرداخت به علت پایان یافتن اعتبار حساب راننده، مقدور نیست.";
    phpAlert($msg);

    unset($_SESSION['phone']);
    unset($_SESSION['sms']);
    unset($_SESSION['code']);
    unset($_SESSION['price']);
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
            <h2>پرداخت</h2>
            <input type="text" name="code" placeholder="کد راننده" required>
            <input type="text" name="price" placeholder="مبلغ واریز" required>
            <input type="text" name="phone" maxlength="10" minlength="10" placeholder="تلفن همراه : 09123456789" required>
            <div class="signin-btn-animate-login">
                <input type="submit" name="qrcode" value="QR Code Scanner" disabled>
                <input type="submit" name="btnpay" value="پرداخت">
            </div>
        </form>
        <a href="signin.php">ورود رانندگان</a>
    </div>    

<?php include_once "page/footer.php"; ?>