<?php

include 'DBconnectPS.php';

session_start();
$unitlocation = $_SESSION['siteid'];
//clientname:a, clientphone:s, clientemail:d, clientgender:f, clientdob:g, clientillcategory:h

$clientname = $_POST['clientname'];
$clientphone = $_POST['clientphone'];
$clientemail = $_POST['clientemail'];
$clientillcategory = $_POST['clientillcategory'];
$clientgender = $_POST['clientgender'];
$clientdob = $_POST['clientdob'];
$clientaddress = $_POST['clientaddress'];
$clienttype = $_POST['clienttype'];

if (strlen($clientname) < 2 || strlen($clientphone) < 11 || strlen($clientillcategory) < 1 || strlen($clientaddress) < 2) {
    echo "Fill all compulsory fields";
    return;
}

$q = "insert into addillcategory (clientname, clientphone, clientemail, clientillcategory, clientgender, clientdob, clienttype, clientaddress, unit)" .
        " values ('$clientname','$clientphone','$clientemail','$clientillcategory','$clientgender','$clientdob','$clienttype','$clientaddress','$unitlocation')";

$a = mysql_query($q);

if ($a) {
    echo "Saved";
} else {
    echo "Not saved";
}
