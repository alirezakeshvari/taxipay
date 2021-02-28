<?php

function selectdrivertopay($code) {
    global $connect;
    $sql = "select * from driver_table where code=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1 ,sec($code));
    $result->execute();

    if ($result->rowCount()) {
        return $result->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function pay($code , $phone , $price , $balance) {
    global $connect;
    $sql = "insert into pay_table set code=? , phone=? , price=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1 ,sec($code));
    $result->bindValue(2 ,sec($phone));
    $result->bindValue(3 ,sec($price));
    $result->execute();

    $sql = "update driver_table set balance=? where code=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1 ,$balance);
    $result->bindValue(2 ,sec($code));
    $result->execute();

    unset($_SESSION['phone']);
    unset($_SESSION['sms']);
    unset($_SESSION['code']);
    unset($_SESSION['price']);
}

?>