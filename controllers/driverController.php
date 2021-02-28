<?php

if (isset($_SESSION['driver'])) {
} else {
    header('location:signin.php?first=login');
}

$driver = selectdriver($_SESSION['driver']);
$code = $driver['code'];
$pays = showpays($code);
$phone = $_SESSION['driver'];
$vipdays = round((($driver['endvip'] - time())/60/60/24));

if (isset($_GET['vip'])) {
    if ($_GET['vip'] == 6) {
        if ($driver['endvip'] > time()) {
            $endvip = $driver['endvip'] + (6 * 30 * 24 * 60 * 60);
        } else {
            $endvip = time() + (6 * 30 * 24 * 60 * 60);
            phpAlert($endvip);
        } 
        addvip($endvip, $phone);
        header('location:driver.php?page=1&vip=done');
    } elseif ($_GET['vip'] == 12) {
        if ($driver['endvip'] > time()) {
            $endvip = $driver['endvip'] + (12 * 30 * 24 * 60 * 60);
        } else {
            $endvip = time() + (12 * 30 * 24 * 60 * 60);
        } 
        addvip($endvip, $phone);
        header('location:driver.php?page=1&vip=done');
    } elseif($_GET['vip'] == "done") {
        $msg = "اکانت vip با موفقیت فعال شد.";
        phpAlert($msg);
    } else {

    }
}

?>