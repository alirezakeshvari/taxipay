<?php
@session_start();
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];
$connect = new PDO('mysql:host=localhost;dbname=taxipay','root','',$options);
?>