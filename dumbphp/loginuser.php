<?php

include 'DBconnectPS.php';

$username = $_POST['username'];
$password = $_POST['password'];

$passwordcrypted = md5($password);

$d = "select * from staff where emailaddress='$username' and password='$passwordcrypted'";
$w = mysql_query($d);

if (mysql_num_rows($w) < 1) {
    echo "1";
} else {
    session_start();
    $q = mysql_fetch_array($w);

    $role = $q['role'];
    $_SESSION['name'] = $q['firstname'] . " " . $q['middlename'] . " " . $q['lastname'];
    $_SESSION['departmentid'] = $q['department'];
    $_SESSION['staffid'] = $q['id'];
    $_SESSION['siteid'] = $q['siteid'];
    $_SESSION['jobdetailid'] = $q['jobdetail'];

    if ($role === "1") {
        $role = "Team lead";
        $_SESSION['role'] = $role;
    } else {
        $role = "Team member";
        $_SESSION['role'] = $role;
    }
    echo "navigator.php";
}