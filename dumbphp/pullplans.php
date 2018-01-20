<?php

include 'DBconnectPS.php';

$client = $_POST['client'];

$a = "select * from billingsubscriberplan where subscriberid='$client'";
$s = mysql_query($a);
if (mysql_num_rows($s) < 1) {
    echo "<option>NO PLANS CONFIGURED</option>";
    return;
}
echo "<option value='0'>--Select plan--</option>";
while ($d = mysql_fetch_array($s)) {
    $subplan = $d['subscriberplanname'];
    $subid = $d['planid'];
    echo "<option value='$subid'>$subplan</option>";
}