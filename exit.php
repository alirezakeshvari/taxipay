<?php 
ob_start();
include_once 'include/init.php';
session_unset();
session_destroy();
header('location:index.php');
?>