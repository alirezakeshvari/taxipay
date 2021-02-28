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