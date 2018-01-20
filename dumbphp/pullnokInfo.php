<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$staffid = flushentries("its");

$sf = mysql_query("select * from nokdetails where staffid='$staffid'");
$t = mysql_fetch_array($sf);

$nokname = $t['nokname'];
$nokmobilenumber = $t['nokmobilenumber'];
$nokaddress = $t['nokaddress'];

echo "<a>$nokname</a><s>$nokmobilenumber</s><d>$nokaddress</d>";