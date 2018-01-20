<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$staffid = flushentries("its");

$sf = mysql_query("select * from bankdetails where staffid='$staffid'");
$t = mysql_fetch_array($sf);

$bankid = $t['bankid'];
$accountnumber = $t['accountnumber'];
$accountname = $t['accountname'];
$bankname = pullbank($bankid);

echo "<a>$bankid</a><s>$bankname</s><d>$accountnumber</d><f>$accountname</f>";

function pullbank($id) {
    $t = mysql_query("select bankname from bankinformation where bankid='$id'");
    $w = mysql_fetch_array($t);
    
    return $w['bankname'];
}
