<?php

include 'DBconnectPS.php';
//coyname, coyClientType, coyContactPhone, coyEmailAddress, coyOfficeAddress
//venname, venClientType, venContactPhone, venEmailAddress, venOfficeAddress, clientsn
$venname = $_POST['venname'];
$venClientType = $_POST['venClientType'];
$venContactPhone = $_POST['venContactPhone'];
$venEmailAddress = $_POST['venEmailAddress'];
$venOfficeAddress = $_POST['venOfficeAddress'];
$clientsn = $_POST['clientsn'];

if (strlen($venname) < 1 || strlen($venClientType) < 1 || strlen($venContactPhone) < 1 || strlen($venEmailAddress) < 1 || strlen($venOfficeAddress) < 1) {
    echo "0";
    return;
}

$j = "UPDATE vendordetails set vendorname='$venname', contactperson='$venClientType', contactphonenumber='$venContactPhone', emailaddress='$venEmailAddress', officeaddress='$venOfficeAddress'  where sn='$clientsn'";

$r = mysql_query($j);

if ($r){
    echo "Done";
}else{
    echo "Could not update";
}
