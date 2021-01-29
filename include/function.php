<?php

// Security

function sec($value){
    return addslashes(htmlspecialchars(trim($value)));
}

// Driver Sign up

function signup($code , $name , $password , $phone) {
    global $connect;
    $sql = "select * from driver_table where phone=? or code=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, sec($phone));
    $result->bindValue(2, sec($code));
    $result->execute();

    if ($result->rowCount()) {
        header('location:signup.php?phone=error');
    } else {
        $sql = "insert into driver_table set code=? , name=? , phone=? , password=? , verify=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, sec($code));
        $result->bindValue(2, sec($name));
        $result->bindValue(3, sec($phone));
        $result->bindValue(4, sec(md5($password)));
        $result->bindValue(5, rand(1111,9999));
        $result->execute();
        
        $_SESSION['driver'] = $phone;
        header('location:driver.php?page=1');
    }
}

// Driver Login

function login($phone , $password) {
    global $connect;
    $sql = "select * from driver_table where phone=? and password=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, sec($phone));
    $result->bindValue(2, sec(md5($password)));
    $result->execute();

    if ($result->rowCount()) {
        $_SESSION['driver'] = $phone;
        header('location:driver.php?page=1');
        return $result;
    } else {
        header('location:signin.php?login=error');
        return false;
    }
}

// Driver panel

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

// Pay

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

// vip

function addvip($endvip , $phone) {
    global $connect;
    $sql = "update driver_table set endvip=? where phone=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $endvip);
    $result->bindValue(2, $phone);
    $result->execute();
}

// Alert

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

// Time to Farsi

function timetofarsi($value)
{
    $time = explode('-', $value);
    return gregorian_to_jalali($time[0], $time[1], $time[2], '/');
}



?>