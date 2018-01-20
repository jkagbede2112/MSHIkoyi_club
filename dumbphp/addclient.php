<?php

//hospitalid:a, clientfirstname: b, clientothername: c, 
//clientlastname: d, clientdob: e, clientgender: f, 
//clientphone: g, clientemailaddress: h, clientaddress: i;

include 'DBconnectPS.php';

session_start();
$staffid = $_SESSION['staffid'];

$errornote = "";
$errorcount = 0;

$hospitalid = $_POST['hospitalid'];
$clientfirstname = $_POST['clientfirstname'];
$clientothername = $_POST['clientothername'];
$clientlastname = $_POST['clientlastname'];
$clientdob = $_POST['clientdob'];
$clientgender = $_POST['clientgender'];
$clientphone = $_POST['clientphone'];
$clientemailaddress = $_POST['clientemailaddress'];
$clientaddress = $_POST['clientaddress'];

if (strlen($hospitalid) < 1) {
    $errorcount++;
    $errornote .= " Hospital ID, ";
}

if (strlen($clientfirstname) < 1) {
    $errorcount++;
    $errornote .= "Firstname, ";
}

if (strlen($clientlastname) < 1) {
    $errorcount++;
    $errornote .= "Lastname, ";
}

if (strlen($clientdob) < 1) {
    $errorcount++;
    $errornote .= "Date Of Birth, ";
}

if (strlen($clientphone) < 1) {
    $errorcount++;
    $errornote .= "Phone number, ";
}

if (strlen($clientaddress) < 1) {
    $errorcount++;
    $errornote .= "Home address.";
}

//

if ($errorcount > 0) {
    echo $errornote;
    return;
} else {
    /*
      $hospitalid = $_POST['hospitalid'];
      $clientfirstname = $_POST['clientfirstname'];
      $clientothername = $_POST['clientothername'];
      $clientlastname = $_POST['clientlastname'];
      $clientdob = $_POST['clientdob'];
      $clientgender = $_POST['clientgender'];
      $clientphone = $_POST['clientphone'];
      $clientemailaddress = $_POST['clientemailaddress'];
      $clientaddress = $_POST['clientaddress'];
     */
    $h = "insert into enrolleelist (hospitalnumber, lastname, firstname, othername, dateofbirth, gender, homeaddress, phonenumber, staffid)"
            ." values ('$hospitalid','$clientlastname','$clientfirstname','$clientothername','$clientdob','$clientgender','$clientaddress','$clientphone','$staffid')";
    echo $h;
    $e = mysql_query($h);
    if ($e){
        echo "Saved";
    }else{
        echo "Not saved";
    }
    
}