<?php

include 'DBconnectPS.php';
include 'purifyer.php';

//staffid: staffid, pensionpin: pensionpin, administrator: administrator

$pensionpin = flushentries("pensionpin");
$administrator = flushentries("administrator");

if (strlen($pensionpin) < 1 || strlen($administrator) < 1) {
    echo "Cannot update";
    return;
}

$staffid = flushentries("staffid");

$afasd = mysql_query("select * from pensiondetails where staffid='$staffid'");
if (mysql_num_rows($afasd) < 1) {
    $ew = "insert into pensiondetails (staffid, pensionpin, pensionadministrator) values('$staffid','$pensionpin','$administrator')";
    $we = mysql_query($ew);
    if ($we) {
        echo "Update successfull";
    } else {
        echo "Not updated";
    }
} else {
    $ew = "update pensiondetails set pensionpin='$pensionpin', pensionadministrator='$administrator' where staffid='$staffid'";
    $we = mysql_query($ew);

    if ($we) {
        echo "Update successfull";
    } else {
        echo "Not updated";
    }
}

