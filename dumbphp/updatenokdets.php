<?php

include 'DBconnectPS.php';
include 'purifyer.php';

//staffid: staffid, mobilenumber: mobilenumber, address: address
$mobilenumber = flushentries("mobilenumber");
$address = flushentries("address");
$name = flushentries("name");


$staffid = flushentries("staffid");
$ad = mysql_query("select * from nokdetails where staffid='$staffid'");
if (mysql_num_rows($ad) > 0) {
    $ew = "update nokdetails set nokname='$name', nokmobilenumber='$mobilenumber', nokaddress='$address' where staffid='$staffid'";
    $we = mysql_query($ew);

    if ($we) {
        echo "Update successfull";
    } else {
        echo "Not updated";
    }
} else {
    $dds = "insert into nokdetails (staffid) values('$staffid')";
    $g = mysql_query($dds);
    if ($g) {
        $ew = "update nokdetails set nokname='$name', nokmobilenumber='$mobilenumber', nokaddress='$address' where staffid='$staffid'";
        $we = mysql_query($ew);

        if ($we) {
            echo "Update successfull";
        } else {
            echo "Not updated";
        }
    }else{
        echo "This staff next of kin detail cannot be updated. Kindly contact Kayode";
    }
}

