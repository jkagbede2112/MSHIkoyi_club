<?php

include 'DBconnectPS.php';
//coyname, coyClientType, coyContactPhone, coyEmailAddress, coyOfficeAddress
$coyname = $_POST['coyname'];
$coyClientType = $_POST['coyClientType'];
$coyContactPhone = $_POST['coyContactPhone'];
$coyEmailAddress = $_POST['coyEmailAddress'];
$coyOfficeAddress = $_POST['coyOfficeAddress'];
$clientsn = $_POST['clientsn'];

if (strlen($coyname) < 1 || strlen($coyClientType) < 1 || strlen($coyContactPhone) < 1 || strlen($coyEmailAddress) < 1 || strlen($coyOfficeAddress) < 1) {
    echo "Complete all fields please";
    return;
}
//echo $coyname . " " . $coyClientType . " " . $coyContactPhone . " " . $coyEmailAddress . " " . $coyOfficeAddress;

$w = "update auditclientdetails set companyname='$coyname' and clienttypesn='$coyClientType' and contactphone='$coyContactPhone' and emailaddress='$coyEmailAddress' and officeaddress='$coyOfficeAddress' where sn='$clientsn'";
$r = mysql_query($w);
echo $w;
if ($r){
    echo "Done";
}else{
    echo "Could not update";
}
