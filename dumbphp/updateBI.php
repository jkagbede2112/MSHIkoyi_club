<?php

include 'DBconnectPS.php';
include 'purifyer.php';

//fn:fn,mn:mn,ln:ln, ms:ms, ig:ig, ea:ea, pn:pn, ha:ha, hq:hq
$fn = flushentries("fn");
$mn = flushentries("mn");
$ln = flushentries("ln");
$ms = flushentries("ms");
$ig = flushentries("ig");
$ea = flushentries("ea");
$pn = flushentries("pn");
$ha = flushentries("ha");
$hq = flushentries("hq");

$staffid = flushentries("its");

$ew = "update staff set firstname='$fn', middlename='$mn', lastname='$ln', maritalstatus='$ms', gender = '$ig', emailaddress='$ea', phonenumber='$pn', homeaddress='$ha', highestqualification='$hq' where staffid='$staffid'";
$we = mysql_query($ew);

if ($we){
    echo "Update successfull";
}else{
    echo "Not updated";
}