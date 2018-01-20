<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$staffid = flushentries("its");

$sf = mysql_query("select * from pensiondetails where staffid='$staffid'");
$t = mysql_fetch_array($sf);

$accountnumber = $t['pensionpin'];
$accountname = $t['pensionadministrator'];

echo "<a>$accountnumber</a><s>$accountname</s>";