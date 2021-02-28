<?php
if (isset($_SESSION['code']) && isset($_SESSION['price']) && isset($_SESSION['phone'])) {
    $code = $_SESSION['code'];
    $driver = selectdrivertopay($code);
} else {
    header("location:index.php?information=error");
}

if (isset($_POST['btnpay'])) {
    
    $code = $_SESSION['code'];
    $phone = $_SESSION['phone'];
    $price = $_SESSION['price'];
    $balance = $driver['balance'] + $price;

    pay ($code , $phone , $price , $balance);
    header("location:index.php?pay=success");
}


$vipdays = round((($driver['endvip'] - time())/60/60/24));

if ($vipdays > 0){

} else {
    header('location:index.php?vip=end');
}

?>