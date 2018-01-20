<?php

include 'DBconnectPS.php';

$smstype = $_POST['smstype'];
$smsweek = $_POST['smsweek'];
$sms = strip_tags($_POST['sms']);
$smsweekrq = str_replace('"', "", $sms);
$smsweekrq2 = str_replace("'", "", $smsweekrq);

$pagecount = ceil(strlen($sms) / 160);

if ($smstype === "Pregnancy") {
    //updatesms
    $a = "update pregnantwomensms set sms='$smsweekrq2', pages='$pagecount'  where week ='$smsweek'";
} else {
    $a = "update pregnantwomendelivered set sms='$smsweekrq2', pages='$pagecount' where week ='$smsweek'";
}

$as = mysql_query($a);
if ($as) {
    echo "Updated";
} else {
    echo "Not updated";
}