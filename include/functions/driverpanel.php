<?php

function selectdriver($phone) {
    global $connect;
    $sql = "select * from driver_table where phone=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1 ,$phone);
    $result->execute();

    if ($result->rowCount()) {
        return $result->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function showpays($code) {
    global $connect;
    global $count;

    $sql = "select * from pay_table where code=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $code);
    $result->execute();
    $tedad = $result->rowCount();
    $count = ceil($tedad / 4);

    if (!isset($_GET['page'])) {
        $cn = 0;
    } else {
        $cn = ($_GET['page'] - 1) * 4;
    }

    $sql = "SELECT * FROM pay_table where code=? order by id desc limit {$cn},4";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $code);
    $result->execute();

    if ($result->rowCount()) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

// vip

function addvip($endvip , $phone) {
    global $connect;
    $sql = "update driver_table set endvip=? where phone=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $endvip);
    $result->bindValue(2, $phone);
    $result->execute();
}

?>