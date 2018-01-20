<?php

include 'DBconnectPS.php';
session_start();
$staffid = $_SESSION['staffid'];

$password = $_POST['password'];
$cryptpass = md5($password);

$q = "select password from staff where id='$staffid'";
$w = mysql_query($q);

$a = mysql_fetch_array($w);

$passw = $a['password'];

if ($passw === $cryptpass) {
    echo "1";
}else{
    echo "0";
}