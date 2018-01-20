<?php

include 'DBconnectPS.php';

//cardestination.value, carpurposeoftravel.value, cardateWtime.value, carduration.value, carfreight.value
session_start();
$staffid = "3";

$cardestination = $_POST['cardestination'];
$carpurposeoftravel = $_POST['carpurposeoftravel'];
$cardateWtime = $_POST['cardateWtime'];
$carduration = $_POST['carduration'];
$carfreight = $_POST['carfreight'];

if (strlen($cardestination) < 1 || strlen($carpurposeoftravel)<1 || strlen($carduration) < 1 || strlen($cardateWtime)<1){
    echo "One or more fields not properly filled in";
}else{
    $a = "insert into carpoolschedule (requestingstaff, destination, purposeoftravel, dateWtime, duration, freight, approval) values ('$staffid','$cardestination','$carpurposeoftravel','$cardateWtime','$carduration','$carfreight','0')";
    echo $a;
    $x = mysql_query($a);
    if ($x){
        echo "Saved";
    }else{
        echo "Not saved";
    }
}

