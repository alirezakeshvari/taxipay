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