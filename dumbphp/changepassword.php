<?php

include 'DBconnectPS.php';

session_start();
$staffid = $_SESSION['staffid'];

$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$verifypass = $_POST['newpass2'];

if ($newpass !== $verifypass) {
    echo "Retried password does not match";
    return;
}

$cryptpass = md5($oldpass);

$q = "select password from staff where id='$staffid'";
$w = mysql_query($q);
$a = mysql_fetch_array($w);
$passw = $a['password'];
$email = $a[''];
if ($passw === $cryptpass) {

    if ($newpass === $verifypass) {
        $savedpass = md5($newpass);
        $q = mysql_query("update staff set password = '$savedpass', unencryptedpass='$newpass' where id='$staffid'");
        if ($q) {
            echo "Password updated";
            //Mail Staff with updated password
            $mailbody = "Your password has changed. <br/><br/> New password is $newpass";
            sendmail($email, "Password Changed", $mailbody);
        }
    } else {
        echo "Passwords do not match";
    }
} else {
    echo "Current password field wrong";
}