<?php

// sign up
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


// sign in

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

?>